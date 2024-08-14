<?php

session_start();
if(!$_SESSION['login']){
    header("location:../../index.php");
}

if($_SESSION['role'] == ""){
    header("location:login.php?p=belum login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            padding-top: 56px; /* Adjust the top padding to accommodate the fixed navbar */
        }

        @media (min-width: 768px) {
            body {
                padding-top: 0;
            }
        }

        /* Center the content */
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Add a shadow effect */
        .shadow-effect {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../home.php"> <i class='bx bx-arrow-back' ></i></a>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="mahasiswa.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5 center-content">
        <?php
        include '../../database/koneksi.php';
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
        ?>

        <section class="shadow-effect p-4">
            <h3 class="text-center">Nama: <?php echo $row['nama']?></h3>
            <h3 class="text-center">NIM: <?php echo $row['nim']?></h3>
            <h3 class="text-center">Alamat: <?php echo $row['alamat']?></h3>
            <h3 class="text-center">SKKM: <?php echo $row['skkm']?></h3>
            <h3 class="text-center">Kegiatan: <?php echo $row["kegiatan"]?></h3>
        </section>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
