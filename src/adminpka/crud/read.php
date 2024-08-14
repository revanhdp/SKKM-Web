<?php
include '../../database/koneksi.php';
session_start();

if(isset($_SESSION['role']) == ""){
    header("location:login.php?p=belum login");
}

$id = $_GET["id"];

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
WHERE m.id = '$id'";
$result = $conn->query($sqlQuery);
$row = $result->fetch_assoc();

$status = $row["skkm"] >= 80 ? "Lulus" : "Belum Memenuhi";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="../../styles/output.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="bg-[#171825] p-8  h-screen">
            <section class="h-full">
                <div class="bg-[#24263A] h-full p-4 rounded-xl relative grid place-items-center">
                    <a class="navbar-brand" href="../home.php"> <i class='bx bx-arrow-back absolute left-8 top-8' ></i></a>
                    <h2 class="text-xl font-bold">DETAIL DATA <?php echo "".$row["nama"]."" ?></h2>
                    <div class="flex gap-1 absolute top-8 right-8">
                        <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                        <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                        <div class="bg-white h-[4px] w-[4px] rounded-full"></div>
                    </div> 
                    <div class="flex flex-col items-center gap-8 relative z-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-4">
                                <div class="space-y-2">
                                    <p class="pl-2">Nama:</p>
                                    <div class="min-w-96 h-16 flex items-center  rounded-3xl p-4 bg-[#1D1E2C]">
                                        <?php echo "".$row["nama"]."" ?>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <p class="pl-2">NIM:</p>
                                    <div class="min-w-96 h-16 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                        <?php echo "".$row["nim"]."" ?>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <p class="pl-2">Alamat:</p>
                                    <div class="min-w-96 h-16 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                        <?php echo "".$row["alamat"]."" ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="space-y-2">
                                    <p class="pl-2">Tanggal Lahir:</p>
                                    <div class="min-w-96 h-16 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
                                        <?php echo "".$row["tgl_lahir"]."" ?>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <p class="pl-2">Kegiatan:</p>
                                    <div class="min-w-96 h-16 flex items-center rounded-3xl p-4 bg-[#1D1E2C] overflow-auto">
                                        <p><?php echo "".$row["kegiatan"]."" ?> </p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <p class="pl-2">Jurusan:</p>
                                    <div class="min-w-96 h-16 flex items-center rounded-3xl p-4 bg-[#1D1E2C]">
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
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
