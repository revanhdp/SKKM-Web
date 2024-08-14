<?php 
include '../database/koneksi.php';
session_start();

if(!$_SESSION['login']){
    header("location:../index.php");
}
$sqlQueryTotalMahasiswa = "SELECT COUNT(*) as total_mahasiswa FROM mahasiswa";
$resultTotalMahasiswa = $conn->query($sqlQueryTotalMahasiswa);

if ($resultTotalMahasiswa !== false) {
    $rowTotalMahasiswa = $resultTotalMahasiswa->fetch_assoc();
    $totalMahasiswa = $rowTotalMahasiswa['total_mahasiswa'];
  
} else {
    echo "Error in query: " . $conn->error;
}

$sqlQuerySkkmTertinggi = "SELECT MAX(skkm) AS skkm_tertinggi FROM mahasiswa";
$resultSkkmTertinggi = $conn->query($sqlQuerySkkmTertinggi);

if ($resultSkkmTertinggi !== false) {
    $rowSkkmTertinggi = $resultSkkmTertinggi->fetch_assoc();
    $skkmTertinggi = $rowSkkmTertinggi['skkm_tertinggi'];
} else {
    $skkmTertinggi = "Error in query: " . $conn->error;
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .container-cta {
            display: flex;
            gap: 8px;
        }
        tbody tr:nth-child(odd) {
            background-color: #C5FFF8;
        }
    </style>
    <link rel="stylesheet" href="../styles/output.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
    </style>
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
                        <img src="../../public/pie-chart.png" width="20">
                        <p>Home</p>
                    </a>
                    <a href="datamahasiswa.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/users.png" width="20">
                        <p>Data Mahasiswa</p>
                    </a>
                    <a href="skkm.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/bar-chart.png" width="20">
                        <p>Validasi SKKM</p>
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
            <section class="flex flex-col pl-4 w-full">
                <div class="bg-[#24263A] w-full rounded-bl-3xl flex justify-between items-center px-8 py-4">
                    <?php 
                        echo "
                        <p class='text-xl font-semibold'>Hello, Admin PKA</p>
                        <div class='flex items-center gap-2'>
                            <p>".$_SESSION["user"]["username"]."</p>
                            <i class='bx bxs-user-circle' style='font-size: 40px;' ></i>
                        </div>
                    
                        "
                    ?>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4 mr-4">
                        <div class="bg-[#24263A] min-h-56 p-4 rounded-xl relative">
                            <div class="flex gap-1 absolute top-8 right-8">
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                            </div> 
                            <p class="text-xl font-normal">TOTAL MAHASISWA</p>
                            <h2 class="text-3xl font-bold mt-2 relative z-10"><?php echo "".$totalMahasiswa."" ?></h2>
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
                        <div class="bg-[#24263A] min-h-56 p-4 rounded-xl relative">
                            <div class="flex gap-1 absolute top-8 right-8">
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                                <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                            </div> 
                            <p class="text-xl font-normal">SKKM TERTINGGI</p>
                            <h2 class="text-3xl font-bold mt-2 relative z-10"><?php echo "".$skkmTertinggi."" ?></h2>
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
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>