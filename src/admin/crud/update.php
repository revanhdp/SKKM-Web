<?php 
session_start();

include '../../database/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="ukuranImg.css">
    <link rel="stylesheet" href="../../styles/output.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        input {
            outline: none;
            background-color: transparent;
            border: 1px solid #DBDFEA;
            border-radius: 8px;
            padding: 8px 16px;
        }

        input:read-only {
            opacity: 0.5;
            cursor: not-allowed;
        }

        input:read-only:focus {
            border-width: 1px;
        }

        input:focus, textarea:focus {
            border-width: 2px;
        }

        textarea {
            outline: none;
            background-color: transparent;
            border: 1px solid #DBDFEA;
            border-radius: 8px;
            max-height: 150px;
            padding: 8px 16px;
        }

        select {
            outline: none;
            background-color: transparent;
            border: 1px solid #DBDFEA;
            border-radius: 8px;
            padding: 8px 16px;
        }

        option {
            background-color: #24263A;
        }

    </style>
</head>

<body>
<?php
//query
$id = $_GET["id"];
$sqlQuery = "SELECT mahasiswa.*, GROUP_CONCAT(kegiatan.nama_kegiatan SEPARATOR ', ') AS kegiatan
FROM mahasiswa
LEFT JOIN kegiatan ON mahasiswa.id = kegiatan.fk_mhs
WHERE mahasiswa.id = '$id'
GROUP BY mahasiswa.id;";

//eksekusi query
$result = $conn->query($sqlQuery);

//menyimpan hasil
$row = $result->fetch_assoc();

?>
<div class="bg-[#171825] p-8  h-screen ">
    <div class="bg-[#1D1E2C] h-full rounded-3xl overflow-y-auto">
        <section class="py-8 px-20">
            <a class="navbar-brand" href="../home.php"> <i class='bx bx-arrow-back' ></i></a>
            <h2 class="mb-3" style="text-align: center;">Edit Data Mahasiswa</h2>

            <form action="edit.php" method="post" enctype="multipart/form-data" class="py-4 flex flex-col gap-8">

                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>

                <div class="form-group flex flex-col gap-2">
                    <label for="nim">Nim</label>
                    <input  type="text" class="form-control" name="nim" id="nim" value=<?php echo $row['nim'] ?>>
                </div>
                <div class="form-group flex flex-col gap-2">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value=<?php echo $row['nama'] ?>>
                </div>
                <div class="form-group flex flex-col gap-2">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?php echo $row['alamat'] ?></textarea>
                </div>
                <div class="form-group flex flex-col gap-2">
                    <label for="tgl_lahir">Tgl Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value=<?php echo $row['tgl_lahir'] ?>>
                </div>
                <div class="flex flex-col gap-4">
                        <label for="upload" class="col-sm-2 col-form-label">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="col-sm-10">
                                <?php 
                                    $opt = ['Teknik Informatika', 'Teknik Industri', 'Teknik Mesin', 'Teknik Kimia'];
                                    $output = '';
                                    for( $i=0; $i<count($opt); $i++ ) {
                                    echo '<option ' 
                                                . ( $row['jurusan'] == $opt[$i] ? 'selected="selected"' : '' ) . '>' 
                                                . $opt[$i] 
                                                . '</option>';
}
                                ?>
                                <!-- <option name="Teknik Informatika">Teknik Informatika</option>
                                <option name="Teknik Industri">Teknik Industri</option>
                                <option name="Teknik Mesin">Teknik Mesin</option>
                                <option name="Teknik Kimia">Teknik Kimia</option> -->
                        </select>
                    </div>

                <button style="background-color: #24263A; padding: 8px 20px; border-radious: 8px; width: max-content;" type="submit">Update</button>
            </form>

            </section>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
    