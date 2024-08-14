<?php 
include '../database/koneksi.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .container-cta {
            display: flex;
            gap: 8px;
        }
        tbody tr:nth-child(odd) {
            background-color: #C5FFF8;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="flex">
        <section class="bg-black w-1/4 text-white flex flex-col items-center justify-start h-[960px] sticky top-0 p-8 pt-32">
            <?php 
                echo "
                <i class='bx bxs-user-circle' style='font-size: 90px;' ></i>
                    <p class='text-xl font-semibold'>".$_SESSION["user"]["username"]."</p>
                 
                "
            ?>

            <div class="mt-32 flex flex-col items-center gap-10">
                <a href="home.php">Home</a>
                <a href="datamahasiswa.php">Data Mahasiswa</a>
                <a href="validasiskkm.php">SKKM</a>
                <a href="../logout.php">Logout</a>
            </div>
        </section>
        <section class="container my-4">
        <table class="table table-bordered w-auto">
                <h1 style="font-size:30px;font-weight:600;margin-bottom:8px;">Belum Disetujui</h1>
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kegiatan</th>
                        <th>Bukti File</th>
                        <th>Bobot</th>
                        <th style="width: 50%;overflow-x:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="post">
                    <?php

                    $sqlQuery = "SELECT kegiatan.*, mahasiswa.nama AS nama_mahasiswa FROM kegiatan
                    LEFT JOIN mahasiswa ON kegiatan.fk_mhs = mahasiswa.id
                    WHERE kegiatan.approved = 'f'";
                    $result = $conn->query($sqlQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nama_mahasiswa"] . "</td>
                                <td>" . $row["nama_kegiatan"] . "</td>
                                <td>" . $row["serti"] . "</td>
                                <td>" . $row["nilai"] . "</td>
                                <td class='container-cta'>
                                        <a href='read.php?id=" . $row["fk_mhs"] . "' class='btn btn-warning btn-sm'>Read</a>
                                        <p>|</p>

                                        <a href='validasi_approved.php?id_mhs=" . $row["fk_mhs"] . "&id_kgtn=" . $row["id"] . "&action=setuju' class='btn btn-success btn-sm'>Setuju</a>
                                        <p>|</p>
                                        <a href='validasi_approved.php?id_mhs=" . $row["fk_mhs"] . "&id_kgtn=" . $row["id"] . "&action=tolak' class='btn btn-danger btn-sm'>Tolak</a>
                                </td >
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
                    }
                    ?>
                    </form>
                </tbody>
            </table>
            <div style="background-color:black;width:100%;height:2px;margin:20px 0;"></div>
            <table class="table table-bordered w-auto">
                <h1 style="font-size:30px;font-weight:600;margin-bottom:8px;">Sudah Disetujui</h1>
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kegiatan</th>
                        <th>Bukti File</th>
                        <th>Bobot</th>
                        <th style="width: 50%;overflow-x:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="post">
                    <?php

                    $sqlQuery = "SELECT kegiatan.*, mahasiswa.nama AS nama_mahasiswa FROM kegiatan
                    LEFT JOIN mahasiswa ON kegiatan.fk_mhs = mahasiswa.id
                    WHERE kegiatan.approved = 't'";
                    $result = $conn->query($sqlQuery);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nama_mahasiswa"] . "</td>
                                <td>" . $row["nama_kegiatan"] . "</td>
                                <td>" . $row["serti"] . "</td>
                                <td>" . $row["nilai"] . "</td>
                                <td class='container-cta'>
                                    
                                    <a href='read.php?id=" . $row["fk_mhs"] . "' class='btn btn-warning btn-sm'>Read</a>
                                    <p>|</p>

                                    <a style='color: white 'class='btn btn-success btn-sm'>Success <i class='bx bx-check'></i></a>
                                    <p></p>

                                </td >
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
                    }
                    ?>
                    </form>
                </tbody>
            </table>
        </section>
    </div>

    <footer class="text-center py-3 bg-dark text-white">
        <p>Copyrigth repan</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
