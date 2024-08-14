<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="../../styles/output.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
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
<div class="bg-[#171825] p-8  h-screen ">
    <div class="bg-[#1D1E2C] h-full rounded-3xl overflow-y-auto">
        <section class="py-8 px-20">
            <a class="navbar-brand" href="../home.php"> <i class='bx bx-arrow-back' ></i></a>
            <h2 class="mb-3" style="text-align: center;">Upload SKKM</h2>

            <form action="uploadskkm_handler.php" method="post" enctype="multipart/form-data" class="py-4 flex flex-col gap-8">
                    <div class="flex flex-col gap-4">
                        <label for="upload" class="col-sm-2 col-form-label">Kegiatan</label>
                        <select name="kegiatan" id="kegiatan" class="col-sm-10">
                                <option disabled>Keikutsertaan MBKM</option>
                                <option name="Magang">Magang</option>
                                <option name="KKN">KKN Tematik</option>
                                <option name="Mengajar">Mengajar di Sekolah</option>
                                <option name="PMM">Pertukaran Mahasiswa</option>
                                <option name="Penelitian">Penelitian</option>
                                <option name="Wirausaha">Kegiatan Wirausaha</option>
                                <option name="StudiIndependen">Studi Independen</option>
                                <option disabled>Program Kreativitas Mahasiswa(PKM)</option>
                                <option name="RE">Riset Eksakta</option>
                                <option name="PM">Pengabdian Masyarakat</option>
                                <option name="PE">Penerapan IPTEK</option>
                                <option disabled>Kegiatan Lomba</option>
                                <option name="Akademik">Lomba Akademik</option>
                                <option name="Non">Lomba non Akademik</option>
                                <option name="Rekognisi">Rekognisi</option>
                                <option disabled>Kegiatan Non Lomba</option>
                                <option name="PKKMB">PKKMB</option>
                                <option name="As">Menjadi Asisten Dosen/lab</option>
                                <option name="Relawan">Relawan Anti Narkoba</option>
                                <option disabled>Keaktifan Organisasi Mahasiswa</option>
                                <option name="Pengurus">Pengurus Ormawa(HMPS,UKM,UKK)</option>
                                <option name="Panitia">Panitia Kegiatan Ormawa</option>
                                <option disabled>Pengembangan Karir</option>
                                <option name="Seminar">Mengikuti Seminar</option>
                                <option name="Workshop">Mengikuti Workshop hard/softskill</option> 
                                <option name="Sertifikasi">Sertifikasi</option> 
                                <option name="TOEFL">Kemampuan B Inggris(TOEFL minimal 425)</option> 
                        </select>
                    </div>
                    <div class="flex flex-col gap-4">
                        <label for="upload" class="col-sm-2 col-form-label">File</label>
                        <input style="cursor: pointer; padding: 40px 20px; border-radius: 8px; border: 1px dashed #DBDFEA" type="file" class="form-control" name="file" id="file" required>
                    </div>
                    <button style="background-color: #24263A; padding: 8px 20px; border-radious: 8px; width: max-content;" type="submit">Upload</button>
                    

            </form>

            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
