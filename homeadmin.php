<?php 
// $id = $_GET['id'];

// // inisialisasi koneksi db
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sia";

// //pembuatan koneksi db
// $conn = new mysqli($servername, $username, $password, $dbname);

// //pengecekan koneksi db
// if ($conn->connect_error) {
//     die("connection Failed" . $conn->connect_error);
// }

// //query
// $sqlQuery = "SELECT * FROM mahasiswa WHERE id = '$id'";

// //eksekusi query
// $result = $conn->query($sqlQuery);

// $sql = "SELECT COUNT(*) AS total_mahasiswa FROM mahasiswa";
// $result = $conn->query($sql);

// //menyimpan hasil
// $row = $result->fetch_assoc();
include 'koneksi.php';
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
            <h1 style='text-align: center' >Selamat datang admin!</h1>
            <div class="flex gap-8 justify-center items-center h-full">
                <div class="w-[300px] h-[180px] rounded-3xl p-4 bg-[#0BF4C8] text-[#131215] relative">
                    <h2 class="text-[#131215] font-medium text-xl">Total Mahasiswa</h2>
                    <p class="text-[#131215] font-semibold text-3xl mt-2">$sql</p>
                    <img src="./foto/1.png" alt="" srcset="" class="absolute right-0 bottom-0" >
                </div>
                <div class="w-[300px] h-[180px] rounded-3xl p-4 bg-[#FAD85D] text-[#131215] relative">
                    <h2 class="text-[#131215] font-medium text-xl">Total Mahasiswa</h2>
                    <p class="text-[#131215] font-semibold text-3xl mt-2">2000rb</p>
                    <img src="./foto/2.png" alt="" srcset="" class="absolute right-0 bottom-0" >
                </div>
                <div class="w-[300px] h-[180px] rounded-3xl p-4 bg-[#F2A0FF] text-[#131215] relative">
                    <h2 class="text-[#131215] font-medium text-xl">Total Mahasiswa</h2>
                    <p class="text-[#131215] font-semibold text-3xl mt-2">2000rb</p>
                    <img src="./foto/3.png" alt="" srcset="" class="absolute right-0 bottom-0" >
                </div>
            </div>
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
