<?php
    session_start();

    
    include '../../database/koneksi.php';

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
elseif ($kegiatan == "KKN Tematik"){
    $nilai += 20;
} 
elseif ($kegiatan == "Mengajar di Sekolah"){
    $nilai += 20;
} 
elseif ($kegiatan == "Pertukaran Mahasiswa"){
    $nilai += 20;
} 
elseif ($kegiatan == "Penelitian"){
    $nilai += 20;
} 
elseif ($kegiatan == "Kegiatan Wirausaha"){
    $nilai += 20;
} 
elseif ($kegiatan == "Studi Independen"){
    $nilai += 20;
} 
elseif ($kegiatan == "Riset Eksakta"){
    $nilai += 40;
} 
elseif ($kegiatan == "Pengabdian Masyarakat"){
    $nilai += 40;
} 
elseif ($kegiatan == "Penerapan IPTEK"){
    $nilai += 40;
} 
elseif ($kegiatan == "Lomba Akademik"){  
    $nilai += 15;
} 
elseif ($kegiatan == "Lomba non Akademik"){
    $nilai += 10;
} 
elseif ($kegiatan == "Rekognisi"){
    $nilai += 15;
} 
elseif ($kegiatan == "PKKMB"){
    $nilai += 20;
} 
elseif ($kegiatan == "Menjadi Asisten Dosen/lab"){
    $nilai += 25;
} 
elseif ($kegiatan == "Relawan Anti Narkoba"){
    $nilai += 10;
} 
elseif ($kegiatan == "Pengurus Ormawa(HMPS,UKM,UKK)"){ 
    $nilai += 15;
}
elseif ($kegiatan == "Panitia Kegiatan Ormawa"){
    $nilai += 15;
}
elseif ($kegiatan == "Mengikuti Seminar"){    
    $nilai += 5;                                                                                
}
elseif ($kegiatan == "Mengikuti Workshop hard/softskill"){
    $nilai += 10;                                                                                
}
elseif ($kegiatan == "Sertifikasi"){
    $nilai += 20;                                                                                
}
elseif ($kegiatan == "Kemampuan B Inggris(TOEFL minimal 425)"){
    $nilai += 20;                                                                                
}


var_dump($kegiatan);


$uploadDirectory = '../../../foto/';

$newFileName = $file;
$counter = 1;

while (file_exists($uploadDirectory . $newFileName)) {
    $newFileName = pathinfo($file, PATHINFO_FILENAME) . '(' . $counter . ').' . pathinfo($file, PATHINFO_EXTENSION);
    $counter++;
}

move_uploaded_file($tmp_file, $uploadDirectory . $newFileName);
// echo $nama_gambar;

// membuat query
$querySQL = "INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `nilai`, `serti`, `approved`, `fk_mhs`) VALUES (NULL, '$kegiatan', '$nilai', '$file', 'f', '$currentUserId')";

//mengeksekusi query
$hasil = $conn->query($querySQL);

//kembali ke halaman index
header('Location: ../home.php');



?>