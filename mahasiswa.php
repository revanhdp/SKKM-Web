<?php
session_start();

if(isset($_SESSION['role']) == ""){
    header("location:login.php?p=belum login");
}

// var_dump($_SESSION['user'])
$currentUser = $_SESSION['user'];
$currentUserId = $currentUser["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="ukuranImg.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 style="text-align: center">Nilai SKKM Mahasiswa</h1>
            <h2>Studi Kasus: Data Mahasiswa</h2>
            <h3>Dashboard PKA</h3>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Home</a>
                <a class="navbar-brand" href="logout.php">Logout</a>
                <a class="navbar-brand" href="datamahasiswa.php">Data Mahasiswa</a>
            </nav>
        </div>
    </header>
    <section class="menu">
        <div class="container">
            <h4>Data Mahasiswa</h4>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kegiatan</th>
                        <th>SKKM</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                    include 'koneksi.php';

                    $kegiatanQuery = "SELECT * FROM kegiatan WHERE fk_mhs = '$currentUserId'";

                    $resultKegiatan = $conn->query($kegiatanQuery);
                    // while ($row = $result->fetch_assoc()) 
                    $rowKegiatan = $resultKegiatan->fetch_all();
                    $kegiatanBox = [];
                    for ($i=0; $i < count($rowKegiatan); $i++) { 
                        # code...
                        array_push($kegiatanBox, $rowKegiatan[$i][1]);
                    }

                    $joinKegiatanBox = join(", ", $kegiatanBox);

                    
                            echo"
                            <tr> 
                                <td>".$currentUser["id"]."</td>
                                <td>".$currentUser["nim"]."</td>
                                <td>".$currentUser["nama"]."</td>
                                <td>".$currentUser["alamat"]."</td>
                                <td>".$joinKegiatanBox."</td>
                                <td>".$currentUser["skkm"]."</td>
                                <td>
                                    <div style='display:flex;gap:8px;'>
                                        <a href='readmahasiswa.php?id=".$currentUser["id"]."' class='btn btn-primary'>Read</a>
                                        <a class='btn btn-secondary' href='uploadskkm.php'>Upload</a>
                                    </div>
                                    </td>
                                    </tr>";
                            ?>
                </tbody>
            </table>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>Copyrigth @revanhdp</p>
        </div>
    </footer>
    
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!-- <a href='update.php?id=".$row["id"]."' class='btn btn-warning'>Update</a> -->