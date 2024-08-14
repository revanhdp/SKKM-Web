<?php 
include '../database/koneksi.php';
session_start();
// SELECT 
//     mahasiswa.*,
//     GROUP_CONCAT(CONCAT(kegiatan.nama_kegiatan, ' (', COUNT(*), 'x)') SEPARATOR ', ') AS kegiatan
// FROM 
//     mahasiswa 
// LEFT JOIN 
//     kegiatan ON mahasiswa.id = kegiatan.fk_mhs 
// GROUP BY 
//     mahasiswa.id, kegiatan.nama_kegiatan;

$currentId = $_GET["id"];

$sqlQueryF = "SELECT kegiatan.*, mahasiswa.nama AS nama FROM kegiatan
LEFT JOIN mahasiswa ON kegiatan.fk_mhs = mahasiswa.id
WHERE kegiatan.approved = 'f' and mahasiswa.id = '$currentId';
";
$resultF = $conn->query($sqlQueryF);

$sqlQueryT = "SELECT kegiatan.*, mahasiswa.nama AS nama FROM kegiatan
LEFT JOIN mahasiswa ON kegiatan.fk_mhs = mahasiswa.id
WHERE kegiatan.approved = 't' and mahasiswa.id = '$currentId';
";
$resultT = $conn->query($sqlQueryT);

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
            flex-direction: column;
            align-items: center;
            height: 100px;
        }

        .container-cta div {
            display: flex;  
            gap: 8px;
            align-items: center;
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
                    <a href="home.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/pie-chart.png" width="20">
                        <p>Home</p>
                    </a>
                    <a href="datamahasiswa.php" class="flex items-center gap-4 rounded-l-3xl py-2 px-4">
                        <img src="../../public/users.png" width="20">
                        <p>Data Mahasiswa</p>
                    </a>
                    <a href="skkm.php" class="flex items-center gap-4 bg-[#1D1E2C] rounded-l-3xl py-2 px-4">
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
            <section class="flex flex-col pl-4 w-full overflow-x-hidden">
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
                <section class="my-4 overflow-y-auto pr-4">
                    <h1 class="text-[#DBDFEA] font-bold text-xl mb-4">BELUM DISETUJUI</h1>
                    <div class="relative">
                        <table class="w-full text-sm text-left rtl:text-right bg-[#24263A] text-[#DBDFEA]">
                            <thead class="text-xs uppercase border-b border-[#1D1E2C]">
                                <tr>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        ID
                                    </th>
                                    <th scope="col" class="px-20 py-3" style="border: 1px solid #1D1e2C;">
                                        NAMA
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        KEGIATAN
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        BUKTI FILE
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        BOBOT
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        ACTION
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultF->num_rows > 0) {
                                    while ($row = $resultF->fetch_assoc()) {
                                        echo "
                                        <tr class='bg-[#24263A] text-[#DBDFEA] border-y border-[#1D1E2C]'>
                                            <th scope='row' class='px-6 py-4 font-medium border-x border-[#1D1E2C]'>
                                                " . $row["id"] . "
                                            </th>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["nama"] . "
                                            </td>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["nama_kegiatan"] . "
                                            </td>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["serti"] . "
                                            </td>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["nilai"] . "
                                            </td>
                                            <td class='px-6 py-4 flex gap-2 items-center border-x border-[#1D1E2C]'>
                                                <a href='validasi_approved.php?id_mhs=" . $row["fk_mhs"] . "&id_kgtn=" . $row["id"] . "&action=setuju' class='btn btn-success btn-sm'>Setuju</a>
                                                <p>|</p>
                                                <a href='validasi_approved.php?id_mhs=" . $row["fk_mhs"] . "&id_kgtn=" . $row["id"] . "&action=tolak' class='btn btn-danger btn-sm'>Tolak</a>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin: 40px 0; border: 2px solid #24263A"></div>
                    <h1 class="text-[#DBDFEA] font-bold text-xl mb-4">SUDAH DISETUJUI</h1>
                    <div class="relative">
                        <table class="w-full text-sm text-left rtl:text-right bg-[#24263A] text-[#DBDFEA]">
                            <thead class="text-xs uppercase border-b border-[#1D1E2C]">
                                <tr>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        ID
                                    </th>
                                    <th scope="col" class="px-20 py-3" style="border: 1px solid #1D1e2C;">
                                        NAMA
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        KEGIATAN
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        BUKTI FILE
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        BOBOT
                                    </th>
                                    <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                        ACTION
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultT->num_rows > 0) {
                                    while ($row = $resultT->fetch_assoc()) {
                                        echo "
                                        <tr class='bg-[#24263A] text-[#DBDFEA] border-y border-[#1D1E2C]'>
                                            <th scope='row' class='px-6 py-4 font-medium border-x border-[#1D1E2C]'>
                                                " . $row["id"] . "
                                            </th>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["nama"] . "
                                            </td>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["nama_kegiatan"] . "
                                            </td>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["serti"] . "
                                            </td>
                                            <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                                " . $row["nilai"] . "
                                            </td>
                                            <td class='px-6 py-4 flex gap-2 items-center border-x border-[#1D1E2C]'>
                                                <a style='color: white 'class='btn btn-success btn-sm'>Success <i class='bx bx-check'></i></a>
                                                <p>|</p>
                                                <a href='validasi_approved.php?id_mhs=" . $row["fk_mhs"] . "&id_kgtn=" . $row["id"] . "&action=sstolak' class='btn btn-danger btn-sm'>Tolak</a>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </section>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>