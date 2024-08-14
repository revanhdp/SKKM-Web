<?php
include '../database/koneksi.php';
session_start();

if(!$_SESSION['login']){
    header("location:../index.php");
}

$currentUser = $_SESSION["user"];
$currentUserId = $currentUser["id"];

$sqlQuery = "SELECT 
m.*,
GROUP_CONCAT(
    IF(k.jumlah_kegiatan > 1, CONCAT(k.nama_kegiatan, ' (', k.jumlah_kegiatan, 'x)'), k.nama_kegiatan) 
    SEPARATOR ', '
) AS kegiatan
FROM 
mahasiswa m
LEFT JOIN 
(SELECT fk_mhs, nama_kegiatan, COUNT(*) as jumlah_kegiatan FROM kegiatan GROUP BY fk_mhs, nama_kegiatan) k
ON m.id = k.fk_mhs
WHERE m.id = '$currentUserId'";
$result = $conn->query($sqlQuery);
$row = $result->fetch_assoc();

$status = $row["skkm"] >= 80 ? "Lulus" : "Belum Memenuhi";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="ukuranImg.css">
    <link rel="stylesheet" href="../styles/output.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="bg-[#171825] p-8  h-screen ">
        <div class="flex bg-[#1D1E2C] h-full rounded-3xl overflow-hidden">
            <section class="bg-[#24263A] w-1/4 pl-8 pt-8">
                <div>
                    <h1 class="text-2xl mb-4 font-bold border-b-2 border-[#1D1E2C] pb-4 mr-8 ">e-SKKM</h1>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="home.php" class="flex items-center gap-4 bg-[#1D1E2C] rounded-l-3xl py-2 px-4">
                        <img src="../../public/user.png" width="20">
                        <p>Home</p>
                    </a>
                    <a href="rankingmahasiswa.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/notepad.png" width="20">
                        <p>Ranking SKKM Mahasiswa</p>
                    </a>
                    <a href="crud/editmhs.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/Vector.png" width="20">
                        <p>Edit</p>
                    </a>
                    <a href="crud/uploadskkm.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/Upload.png" width="20">
                        <p>Upload SKKM</p>
                    </a>
                    <div class="border-b-2 border-[#1D1E2C] pb-4 mr-8"></div>
                    <!-- <a href="datamahasiswa.php">Data Mahasiswa</a>
                    <a href="validasiskkm.php">SKKM</a>
                    <a href="../logout.php">Logout</a> -->
                </div>
                <div class="pt-2">
                    <a href="../logout.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/log-out.png" width="20">
                        <p>Logout</p>
                    </a>
                </div>
            </section>
            <section class="flex flex-col pl-4 w-full overflow-x-hidden">
                <div class="bg-[#24263A] w-full rounded-bl-3xl flex justify-between items-center px-8 py-4">
                    <?php 
                        echo "
                        <p class='text-xl font-semibold'>Hello, ".$_SESSION["user"]["nama"]."</p>
                        <div class='flex items-center gap-2'>
                            <p>".$_SESSION["user"]["nama"]."</p>
                            <i class='bx bxs-user-circle' style='font-size: 40px;' ></i>
                        </div>
                    
                        "
                    ?>
                </div>
                <section class="my-4 overflow-y-auto mr-4">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-[#24263A] min-h-36 p-4 rounded-xl relative">
                            <div class="flex gap-1 absolute top-8 right-8">
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                            </div> 
                            <p class="text-sm font-normal">SKKM</p>
                            <h2 class="text-xl font-bold mt-2 relative z-10"><?php echo "".$row["skkm"]."" ?></h2>
                            <div class="absolute right-0 bottom-0">
                                <svg width="320" height="120" viewBox="0 0 132 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.7486 35.5818C10.324 40.8943 6.63687 45.4478 0 44.6889V50H132V0.670465C131.508 0.164516 129.64 -0.543812 126.101 0.670465C121.676 2.18831 112.089 16.6079 103.24 21.1614C94.3911 25.7149 84.8045 15.0893 75.9553 14.3304C67.1061 13.5714 63.419 27.991 55.3073 29.5088C47.1955 31.0267 41.2961 26.4747 33.1844 24.9569C25.0726 23.439 19.1732 30.2694 14.7486 35.5818Z" fill="url(#paint0_linear_228_2)"/>
                                    <path d="M12 38.6522C12.7346 39.4454 14.9383 40.2386 17.8765 37.0658C21.5494 33.0997 23.7531 23.5811 32.5679 21.9946C41.3827 20.4082 43.5864 29.1336 54.6049 31.5133C65.6235 33.8929 69.2963 31.5139 75.1728 27.5478C81.0494 23.5817 87.6605 8.51062 97.9444 8.51062C108.228 8.51062 111.901 11.6835 119.247 19.6157C125.123 25.9614 129.531 27.5478 131 27.5478" stroke="#894BA9" stroke-width="0.5"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_228_2" x1="106.19" y1="3.03569" x2="104.628" y2="52.3629" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#7B4397"/>
                                    <stop offset="1" stop-color="#7B4397" stop-opacity="0"/>
                                    </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="bg-[#24263A] min-h-36 p-4 rounded-xl relative">
                            <div class="flex gap-1 absolute top-8 right-8">
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                            </div> 
                            <p class="text-sm font-normal">Kegiatan</p>
                            <h2 class="text-xl font-bold mt-2 relative z-10"><?php echo "".$row["kegiatan"]."" ?></h2>
                            <div class="absolute right-0 bottom-0">
                                <svg width="320" height="120" viewBox="0 0 132 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.7483 35.5818C10.3238 40.8943 6.63674 45.4478 0 44.6889V50H131.997V0.670465C131.506 0.164516 129.638 -0.543812 126.098 0.670465C121.674 2.18831 112.087 16.6079 103.238 21.1614C94.3892 25.7149 84.8028 15.0893 75.9538 14.3304C67.1048 13.5714 63.4177 27.991 55.3061 29.5088C47.1946 31.0267 41.2953 26.4747 33.1837 24.9569C25.0721 23.439 19.1728 30.2694 14.7483 35.5818Z" fill="url(#paint0_linear_4_1854)"/>
                                    <path d="M13.207 39.055C13.9403 39.8363 16.1403 40.6175 19.0736 37.4925C22.7402 33.5863 24.9401 24.2113 33.74 22.6488C42.5398 21.0863 44.7397 29.68 55.7395 32.0238C66.7393 34.3675 70.4059 32.0244 76.2724 28.1182C82.139 24.2119 88.7388 9.36816 99.0053 9.36816C109.272 9.36816 112.938 12.4932 120.272 20.3057C126.138 26.5557 130.538 28.1182 132.005 28.1182" stroke="#894BA9" stroke-width="0.5"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_4_1854" x1="106.188" y1="3.03569" x2="104.626" y2="52.3629" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#DB2379"/>
                                    <stop offset="1" stop-color="#DB2379" stop-opacity="0"/>
                                    </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="bg-[#24263A] min-h-36 p-4 rounded-xl relative">
                            <div class="flex gap-1 absolute top-8 right-8">
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                            </div> 
                            <p class="text-sm font-normal">Status</p>
                            <?php 
                                echo $status == 'Lulus' ? "<h2 style='color: #A1EEBD;' class='text-xl font-bold mt-2 relative z-10'>$status</h2>" : "<h2 style='color: red;' class='text-xl font-bold mt-2 relative z-10'>$status</h2>";
                            ?>
                            <div class="absolute right-0 bottom-0">
                                <svg width="320" height="120" viewBox="0 0 132 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.7486 35.5818C10.324 40.8943 6.63687 45.4478 0 44.6889V50H132V0.670465C131.508 0.164516 129.64 -0.543812 126.101 0.670465C121.676 2.18831 112.089 16.6079 103.24 21.1614C94.3911 25.7149 84.8045 15.0893 75.9553 14.3304C67.1061 13.5714 63.419 27.991 55.3073 29.5088C47.1955 31.0267 41.2961 26.4747 33.1844 24.9569C25.0726 23.439 19.1732 30.2694 14.7486 35.5818Z" fill="url(#paint0_linear_4_1818)"/>
                                    <path d="M13.1982 39.054C13.9315 39.8353 16.1315 40.6165 19.0648 37.4915C22.7315 33.5853 24.9315 24.2103 33.7315 22.6478C42.5315 21.0853 44.7315 29.679 55.7315 32.0228C66.7315 34.3665 70.3982 32.0234 76.2648 28.1172C82.1315 24.2109 88.7315 9.36719 98.9982 9.36719C109.265 9.36719 112.932 12.4922 120.265 20.3047C126.132 26.5547 130.532 28.1172 131.998 28.1172" stroke="#894BA9" stroke-width="0.5"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_4_1818" x1="106.19" y1="3.03569" x2="104.628" y2="52.3629" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#DC2430"/>
                                    <stop offset="1" stop-color="#DC2430" stop-opacity="0"/>
                                    </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                            <div class="bg-[#24263A] min-h-36 p-4 rounded-xl relative mt-4">
                                <div class="flex gap-1 absolute top-8 right-8">
                                    <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                    <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                    <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                </div> 
                                <p class="text-sm font-normal mb-2">Profil</p>
                                <div class="flex flex-col items-center gap-8 relative z-10">
                                    <div>
                                        <i class='bx bxs-user-circle' style='font-size: 80px;' ></i>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-4">
                                            <div class="space-y-2">
                                                <p class="pl-2">Nama:</p>
                                                <div class="min-w-96 h-8 flex items-center  rounded-3xl p-4 bg-[#1D1E2C]">
                                                    <?php echo "".$row["nama"]."" ?>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <p class="pl-2">NIM:</p>
                                                <div class="min-w-96 h-8 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                                    <?php echo "".$row["nim"]."" ?>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <p class="pl-2">Alamat:</p>
                                                <div class="min-w-96 h-8 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                                    <?php echo "".$row["alamat"]."" ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-4">
                                            <div class="space-y-2">
                                                <p class="pl-2">Tanggal Lahir:</p>
                                                <div class="min-w-96 h-8 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                                    <?php echo "".$row["tgl_lahir"]."" ?>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <p class="pl-2">SKKM:</p>
                                                <div class="min-w-96 h-8 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                                    <p><?php echo "".$row["skkm"]."" ?> </p>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <p class="pl-2">Jurusan:</p>
                                                <div class="min-w-96 h-8 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                                    <?php echo "".$row["jurusan"]."" ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute right-0 bottom-0">
                                    <svg width="320" height="120" viewBox="0 0 132 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.7483 35.5818C10.3238 40.8943 6.63674 45.4478 0 44.6889V50H131.997V0.670465C131.506 0.164516 129.638 -0.543812 126.098 0.670465C121.674 2.18831 112.087 16.6079 103.238 21.1614C94.3892 25.7149 84.8028 15.0893 75.9538 14.3304C67.1048 13.5714 63.4177 27.991 55.3061 29.5088C47.1946 31.0267 41.2953 26.4747 33.1837 24.9569C25.0721 23.439 19.1728 30.2694 14.7483 35.5818Z" fill="url(#paint0_linear_4_1854)"/>
                                        <path d="M13.207 39.055C13.9403 39.8363 16.1403 40.6175 19.0736 37.4925C22.7402 33.5863 24.9401 24.2113 33.74 22.6488C42.5398 21.0863 44.7397 29.68 55.7395 32.0238C66.7393 34.3675 70.4059 32.0244 76.2724 28.1182C82.139 24.2119 88.7388 9.36816 99.0053 9.36816C109.272 9.36816 112.938 12.4932 120.272 20.3057C126.138 26.5557 130.538 28.1182 132.005 28.1182" stroke="#894BA9" stroke-width="0.5"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_4_1854" x1="106.188" y1="3.03569" x2="104.626" y2="52.3629" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DB2379"/>
                                        <stop offset="1" stop-color="#DB2379" stop-opacity="0"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
        
    
        
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!-- <a href='update.php?id=".$row["id"]."' class='btn btn-warning'>Update</a> -->