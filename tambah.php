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

// tangkap input user
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$skkm = 0;
$selectedKegiatan = $_POST['kegiatan']; // Ambil array kegiatan yang dipilih

$skkmMapping = [
    'magang' => 20,
    'seminar' => 5,
    'ukm' => 15,
    'pkkmb' => 20,
    'lomba' => 15,
    'pkm' => 20,
    'aslab' => 25,
];

// Lakukan penghitungan SKKM berdasarkan kegiatan yang dipilih
$selectedKegiatanLower = array_map('strtolower', $selectedKegiatan);

foreach ($selectedKegiatanLower as $kegiatan) {
    if (isset($skkmMapping[$kegiatan])) {
        $skkm += $skkmMapping[$kegiatan];
    }
}

// Gabungkan nilai kegiatan menjadi satu string dipisahkan koma
$kegiatanString = implode(", ", $selectedKegiatan);

// membuat query
$querySQL = "INSERT INTO mahasiswa(nim, nama, alamat, kegiatan, skkm) VALUES ('$nim', '$nama', '$alamat', '$kegiatanString', '$skkm')";


// mengeksekusi query
$hasil = $conn->query($querySQL);


    //kembali ke halaman index
    header('Location: index.php');

?>