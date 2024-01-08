<?php 
session_start()
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
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
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="homeadmin.php">Home</a>
                <a href="halamanadmin.php">Data Mahasiswa</a>
                <a href="validasiskkmadmin.php">SKKM</a>
                <a href="logout.php">Logout</a>
            </div>
        </section>
        <section class="container my-4">
            <h4 class="mb-3">Data Mahasiswa</h4>
            <nav class="mb-3">
                <a href="create.php" class="btn btn-primary">Create Data <i class='bx bx-edit-alt'></i></a>
            </nav>
            <table class="table table-bordered w-auto">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th style="width: 15%">Tgl Lahir</th>
                        <th>SKKM</th>
                        <th style="width: 50%;overflow-x:auto;">Kegiatan</th>
                        <th>Cek Data Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';

                    $sqlQuery = "SELECT * FROM mahasiswa";
                    $result = $conn->query($sqlQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nim"] . "</td>
                                <td>" . $row["nama"] . "</td>
                                <td>" . $row["alamat"] . "</td>
                                <td>" . $row["tgl_lahir"] . "</td>
                                <td>" . $row["skkm"] . "</td>
                                <td>" . $row["kegiatan"] . "</td>
                                <td class='container-cta'>
                                    <a href='read.php?id=" . $row["id"] . "' class='btn btn-success btn-sm'>Read</a>
                                    <p>|</p>
                                    <a href='update.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Update</a>
                                    <p>|</p>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>
                                </td >
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
                    }
                    ?>
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
