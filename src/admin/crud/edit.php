<?php
session_start();
if ($_SESSION['role'] != "admin" or $_SESSION['role'] == "") {
    header("location:login.php");
}

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

//tangkap input user
$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$jurusan = $_POST['jurusan'];
$querySQL = "UPDATE mahasiswa SET nim=?, nama=?, alamat=?, tgl_lahir=?, jurusan=? WHERE id=?";
$stmt = $conn->prepare($querySQL);
$stmt->bind_param("sssssi", $nim, $nama, $alamat, $tgl_lahir, $jurusan, $id);


// mengeksekusi query
$hasil = $stmt->execute();

// periksa apakah query berhasil dieksekusi
if ($hasil) {
    // kembali ke halaman index jika berhasil
    header('Location: ../datamahasiswa.php');
} else {
    // tangani kesalahan jika query gagal dieksekusi
    echo "Error: " . $stmt->error;
}
?>
