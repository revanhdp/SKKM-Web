<?php
session_start();
if(!$_SESSION['login']){
    header("location:../../index.php");
}
// Periksa apakah pengguna memiliki peran admin atau sudah login
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
//     header("location:login.php");
//     exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
// }

// // Periksa apakah ada pengguna yang sesuai di sesi
// if (!isset($_SESSION["user"])) {
//     header("location:login.php");
//     exit();
// }

// inisialisasi koneksi db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skkm";

//pembuatan koneksi db
$conn = new mysqli($servername, $username, $password, $dbname);

//pengecekan koneksi db
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

// tangkap input user
$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$password = $_POST['password'];

// Pastikan untuk menggunakan parameterized query untuk menghindari SQL injection
$querySQL = "UPDATE mahasiswa SET nim=?, nama=?, alamat=?, tgl_lahir=?, password=? WHERE id=?";
$stmt = $conn->prepare($querySQL);
$stmt->bind_param("sssssi", $nim, $nama, $alamat, $tgl_lahir, $password, $id);

// mengeksekusi query
$hasil = $stmt->execute();

// periksa apakah query berhasil dieksekusi
if ($hasil) {
    // kembali ke halaman index jika berhasil
    header('Location: ../home.php');
} else {
    // tangani kesalahan jika query gagal dieksekusi
    echo "Error: " . $stmt->error;
}

// tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
