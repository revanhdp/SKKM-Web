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

?>