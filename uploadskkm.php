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
            <a href="mahasiswa.php" class="text-white">Home</a>
        </nav>
    </header>

    <section class="container my-4">
        <h2 class="mb-3">Input Kegiatan Mahasiswa</h2>

        <form action="uploadskkm_handler.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="upload" class="col-sm-2 col-form-label">Kegiatan</label>
                <select name="kegiatan" id="kegiatan" class="col-sm-10">
                        <option  name="Magang">Magang</option>
                        <option  name="UKM">UKM</option>
                        <option name="PKKMB">PKKMB</option>
                        <option name="PKM">PKM</option>
                        <option name="Seminar">Seminar</option>
                        <option name="Lomba">Lomba</option>
                        <option name="Aslab">Aslab</option>
                </select>
                <label for="upload" class="col-sm-2 col-form-label">File</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="file" required>
                </div>
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
