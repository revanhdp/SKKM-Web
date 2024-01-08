<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Halaman Tambah Data</h1>
        <nav>
            <a href="index.php" class="text-white">Home</a>
        </nav>
    </header>

    <section class="container my-4">
        <h2 class="mb-3">Input Data Mahasiswa</h2>

        <form action="tambah.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim" id="nim" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat" rows="4" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tgl Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kegiatan</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="Magang" id="kegiatanMagang">
                        <label class="form-check-label" for="kegiatanMagang">Magang</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="UKM" id="kegiatanUKM">
                        <label class="form-check-label" for="kegiatanUKM">UKM</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="PKKMB" id="kegiatanPKKMB">
                        <label class="form-check-label" for="kegiatanPKKMB">PKKMB</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="PKM" id="kegiatanPKM">
                        <label class="form-check-label" for="kegiatanPKM">PKM</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="Lomba" id="kegiatanLomba">
                        <label class="form-check-label" for="kegiatanLomba">Lomba</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="Seminar" id="kegiatanSeminar">
                        <label class="form-check-label" for="kegiatanSeminar">Seminar</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kegiatan[]" value="AsLab" id="kegiatanAsLab">
                        <label class="form-check-label" for="kegiatanAslab">AsLab</label>
                    </div>
                    <!-- Anda dapat menambahkan opsi kegiatan lainnya sesuai kebutuhan -->
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
