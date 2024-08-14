<?php

// Mulai sesi
session_start();

// Include koneksi
include 'database/koneksi.php';

$username = $_POST['username'];
$pass = $_POST['password'];

// Query untuk mencari admin berdasarkan username dan password
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$pass'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$admin = mysqli_fetch_assoc($result);

if ($admin) {
    // Jika admin ditemukan
    $_SESSION['user'] = $admin;
    $_SESSION['role'] = $admin['role'];

    $_SESSION['login'] = true;
    $_SESSION['error'] = false;
    // Redirect sesuai dengan peran (role)
    if ($admin['role'] == 'admin') {
        header("location:admin/home.php");
    } elseif ($admin['role'] == 'adminpka') {
        header("location:adminpka/home.php");
    } else {
        // Handle jika terdapat peran lain (opsional)
        echo "Peran tidak valid.";
    }
    
    // header("location:admin/home.php");
} else {
    // Tambahkan logika untuk penanganan kesalahan login
    $_SESSION['login'] = false;
    $_SESSION['error'] = true;
    header("location:loginasadmin.php");
}

?>
