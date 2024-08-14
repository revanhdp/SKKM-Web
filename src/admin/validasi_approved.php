<?php 
include '../database/koneksi.php';
session_start();

$id_mhs = $_GET['id_mhs'];
$id_kgtn = $_GET['id_kgtn'];
$action = $_GET['action'];

if ($action == 'setuju'){
    $queryKegiatan = "SELECT * FROM kegiatan WHERE id = '$id_kgtn'";
    $queryMhs = "SELECT * FROM mahasiswa WHERE id='$id_mhs'";

    $resultKegiatan = $conn->query($queryKegiatan);
    $resultMhs = $conn->query($queryMhs);

    $rowKegiatan = $resultKegiatan->fetch_assoc();
    $rowMhs = $resultMhs->fetch_assoc();

    // ubah table kegiatan
    $approved = 't';

    // ubah table mahasiswa
    $nilaiMhsSebelumnya = $rowMhs['skkm'];
    $nilaiKegiatan = $rowKegiatan['nilai'];
    $total = $nilaiMhsSebelumnya + $nilaiKegiatan;

    $updateMhs = "UPDATE mahasiswa SET skkm = '$total' WHERE id = '$id_mhs'";
    $updateKegiatan = "UPDATE kegiatan SET approved = '$approved' WHERE id = '$id_kgtn'";

    // mengeksekusi query
    $conn->query($updateMhs);
    $conn->query($updateKegiatan);

    //kembali ke halaman index
    header('Location: validasiskkm.php?id='.$id_mhs);

} else if ($action == 'tolak'){
    $deleteKegiatan = "DELETE FROM `kegiatan` WHERE `kegiatan`.`id` = $id_kgtn";
    $conn->query($deleteKegiatan);
    header('Location: validasiskkm.php?id='.$id_mhs);

} else if ($action == 'sstolak'){
    $queryKegiatan = "SELECT * FROM kegiatan WHERE id = '$id_kgtn'";
    $queryMhs = "SELECT * FROM mahasiswa WHERE id='$id_mhs'";

    $resultKegiatan = $conn->query($queryKegiatan);
    $resultMhs = $conn->query($queryMhs);

    $rowKegiatan = $resultKegiatan->fetch_assoc();
    $rowMhs = $resultMhs->fetch_assoc();

    // ubah table kegiatan
    $approved = 'f';

    // ubah table mahasiswa
    $nilaiMhsSebelumnya = $rowMhs['skkm'];
    $nilaiKegiatan = $rowKegiatan['nilai'];
    $total = $nilaiMhsSebelumnya - $nilaiKegiatan;

    $updateMhs = "UPDATE mahasiswa SET skkm = '$total' WHERE id = '$id_mhs'";
    $updateKegiatan = "UPDATE kegiatan SET approved = '$approved' WHERE id = '$id_kgtn'";

    $deleteKegiatan = "DELETE FROM `kegiatan` WHERE `kegiatan`.`id` = $id_kgtn";
    $conn->query($deleteKegiatan);

    // mengeksekusi query
    $conn->query($updateMhs);
    $conn->query($updateKegiatan);

    //kembali ke halaman index
    header('Location: validasiskkm.php?id='.$id_mhs);

} else  {
    // code gua
    $deleteKegiatan = "DELETE FROM `kegiatan` WHERE `kegiatan`.`id` = $id_kgtn";
    $conn->query($deleteKegiatan);
    header('Location: validasiskkm.php?id='.$id_mhs);
}


// $sqlQuery = "SELECT * FROM mahasiswa WHERE id = '$id'";
// $result = $conn->query($sqlQuery);
// $row = $result->fetch_assoc();

?>