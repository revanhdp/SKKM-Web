<?php

// mulai sesi
session_start();

// 
include 'koneksi.php';

$username = $_POST['username'];
$pass = $_POST['pass'];
$isadmin = $_POST['admin'];
var_dump($isadmin);

// $dataMsh = mysqli_query();

global $data;
if($isadmin == null){
    $data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE mahasiswa.nama = '$username' and mahasiswa.nim = '$pass'") or die(mysqli_error($conn));
}else {
    $data = mysqli_query($conn, "SELECT * FROM admin WHERE admin.username = '$username' and admin.password = '$pass'") or die(mysqli_error($conn));
}

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $row = mysqli_fetch_assoc($data);
    // $row_data = mysqli_fetch_assoc($dataMsh);
    $_SESSION['user'] = $row;
    var_dump($row);
    // $_SESSION['data'] = $row_data;
    // var_dump($row);

    if ($row['role'] == "admin") {
        $_SESSION['role'] = "admin";
        header("location:halamanadmin.php");
    } elseif ($row['role'] == "mahasiswa") {
        $_SESSION['role'] = "mahasiswa";
        header("location:mahasiswa.php");
    }
} else {
    header("location:login.php?p=login gagal");
}
?>
