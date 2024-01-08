<?php
session_start();
if($_SESSION['role'] != "admin" or $_SESSION['role'] == ""){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
</head>
<body>
    <header>
        <h1>Halaman Delete Data</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>
    
    <section>
    <?php
        // inisialisasi koneksi db
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "skkm";

        //pembuatan koneksi db
        $conn = new mysqli($servername,$username,$password,$dbname);

        //pengecekan koneksi db
        if($conn -> connect_error){
            die("connection Failed" . $conn -> connect_error);
        }

        //tangkap input user
        $id = $_GET['id'];

        //membuat query
        $querySQL = "DELETE FROM mahasiswa WHERE id = '$id'";

        //mengeksekusi query
        $hasil = $conn->query($querySQL);




    ?>

    <h3>Data Berhasil dihapus</h3>
    </section>
</body>
</html>