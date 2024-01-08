<?php
    session_start();

    include 'koneksi.php';

    $currentUserId = $_SESSION["user"]["id"];
    // var_dump($currentUserId);
    // inisialisasi koneksi db 
// tangkap input user
$file = $_FILES['file']['name'];
$tmp_file = $_FILES['file']['tmp_name'];
$kegiatan = $_POST['kegiatan'];

$nilai = 0;
if ($kegiatan == "UKM"){
    $nilai += 15;
} elseif ($kegiatan == "Magang"){
    $nilai += 20;
}
elseif ($kegiatan == "PKKMB"){
    $nilai += 20;
}
elseif ($kegiatan == "PKM"){
    $nilai += 15;
}
elseif ($kegiatan == "Seminar"){
    $nilai += 5;                                                                                
}
elseif ($kegiatan == "Lomba"){
    $nilai += 15;
} elseif ($kegiatan == "Aslab"){
    $nilai += 25;
}

move_uploaded_file($tmp_file,'foto/'.$file);

// echo $nama_gambar;

// membuat query
$querySQL = "INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `nilai`, `serti`, `approved`, `fk_mhs`) VALUES (NULL, '$kegiatan', '$nilai', '$file', 'f', '$currentUserId')";

//mengeksekusi query
$hasil = $conn->query($querySQL);

//kembali ke halaman index
header('Location: mahasiswa.php');



?>