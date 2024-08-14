<?php

// mulai sesi
session_start();

// 
include 'database/koneksi.php';

$username = $_POST['nim'];
$pass = $_POST['password'];

// $dataMsh = mysqli_query();

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE mahasiswa.nim = '$username' and mahasiswa.password = '$pass'") or die(mysqli_error($conn));
    // $data = mysqli_query($conn, "SELECT * FROM admin WHERE admin.username = '$username' and admin.password = '$pass'") or die(mysqli_error($conn));

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $row = mysqli_fetch_assoc($data);
    // $row_data = mysqli_fetch_assoc($dataMsh);
    $_SESSION['user'] = $row;
    // $_SESSION['data'] = $row_data;
    // var_dump($row);
    $_SESSION['role'] = "mahasiswa";
    $_SESSION['login'] = true;
    $_SESSION['error'] = false;
    header("location:mahasiswa/home.php");
} else {
    $_SESSION['login'] = false;
    $_SESSION['error'] = true;
    header("location:index.php");
}
?>
