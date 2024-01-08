<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="bg-secondary text-white text-center py-4">
        <h1>Halaman Update Data</h1>
        <nav>
            <a href="halamanadmin.php" class="text-white">Home</a>
        </nav>
    </header>

    <?php
    //tangkap id mhs yang ingin di read
    $id = $_GET['id'];

    // inisialisasi koneksi db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skkm";

    //pembuatan koneksi db
    $conn = new mysqli($servername, $username, $password, $dbname);

    //pengecekan koneksi db
    if ($conn->connect_error) {
        die("connection Failed" . $conn->connect_error);
    }

    //query
    $sqlQuery = "SELECT * FROM mahasiswa WHERE id = '$id'";

    //eksekusi query
    $result = $conn->query($sqlQuery);

    //menyimpan hasil
    $row = $result->fetch_assoc();
    
    ?>

    <section class="container my-4">
        <a class="navbar-brand" href="halamanadmin.php"> <i class='bx bx-arrow-back' ></i></a>
        <h2 class="mb-3" style="text-align: center;">Edit Data Mahasiswa</h2>

        <form action="edit.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value=<?php echo $row['id'] ?>>

            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="text" class="form-control" name="nim" id="nim" value=<?php echo $row['nim'] ?>>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value=<?php echo $row['nama'] ?>>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?php echo $row['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tgl Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value=<?php echo $row['tgl_lahir'] ?>>
            </div>
            <div class="form-group">
                <label for="kegiatan">Kegiatan</label>
                <div>
                    <input type="checkbox" name="kegiatan[]" value="Magang" <?php echo (in_array('Magang', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> Magang<br>
                    <input type="checkbox" name="kegiatan[]" value="UKM" <?php echo (in_array('UKM', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> UKM<br>
                    <input type="checkbox" name="kegiatan[]" value="PKKMB" <?php echo (in_array('PKKMB', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> PKKMB<br>
                    <input type="checkbox" name="kegiatan[]" value="PKM" <?php echo (in_array('PKM', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> PKM<br>
                    <input type="checkbox" name="kegiatan[]" value="Lomba" <?php echo (in_array('Lomba', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> Lomba<br>
                    <input type="checkbox" name="kegiatan[]" value="Seminar" <?php echo (in_array('Seminar', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> Seminar<br>
                    <input type="checkbox" name="kegiatan[]" value="AsLab" <?php echo (in_array('AsLab', explode(', ', $row['kegiatan']))) ? 'checked' : ''; ?>> AsLab<br>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
    