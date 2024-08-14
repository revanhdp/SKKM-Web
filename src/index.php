<?php
session_start();
if(isset($_SESSION['error'])){
    if($_SESSION['error'] && isset($_SESSION['error'])){
        echo "<script>alert('username / password salah!')</script>";
        $_SESSION['error'] = false;
    }
}

if (isset($_SESSION['role'])){
    if($_SESSION['role'] == "admin" && $_SESSION['login']){
        header("location:admin/home.php");
    } else if($_SESSION['role'] == "mahasiswa" && $_SESSION['login']){
        header("location:mahasiswa/home.php");
    } else if($_SESSION['role'] == "adminpka" && $_SESSION['login']){
        header("location:adminpka/home.php");
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles/output.css">
    <style type="text/css">
        .sky {
            background-image: url("../public/sky.webp");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="sky h-screen flex justify-end">
        <form action="cek_login.php" method="POST" autocomplete="off" class="bg-white rounded-l-3xl gap-8 flex flex-col items-center justify-center" style="width: 60%;">
            <h1 class="text-3xl font-bold text-[#24263A]">Login to e-SKKM</h1>
            <div class="space-y-8">
                <div class="flex flex-col gap-1">
                    <label for="nim" class="w-max font-bold text-[#24263A]">NIM</label>
                    <input required type="text" name="nim" id="nim" placeholder="ex: 11522*****" class="text-[#24263A] border-2 border-zinc-400 focus:border-[#24263A] px-2 w-[512px] focus:scale-x-105 transition-all py-2 rounded">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password" class="w-max font-bold text-[#24263A]">PASSWORD</label>
                    <input required type="password" name="password" id="password" placeholder="*********" class="text-[#24263A] border-2 border-zinc-400 focus:border-[#24263A] px-2 w-[512px] focus:scale-x-105 transition-all py-2 rounded">
                </div>
            </div>
           
            </input>
            <input type="submit" value="Login" class="bg-[#24263A] text-white rounded py-2 w-[512px] px-2">
            <p class="text-zinc-400">Anda adalah admin? <a href="loginasadmin.php" class="text-[#24263A]">login sebagai Admin</a></p>
        </form>
        <?php
        $p = isset($_GET['p']) ? $_GET['p'] : '';
        
        if ($p == "belum login") {
            echo '<h5> Anda Belum Login </h5>';
        } elseif ($p == "bukan admin") {
            echo '<h5> Anda Bukan Admin, Kamu Tidak Memiliki Izin Untuk Memasuki Laman Tersebut</h5>';
        } elseif ($p == "login gagal") {
            echo '<h5> Login gagal, username atau password yang anda masukkan salah</h5>';
        } else {

        }
        ?>
    </div>
</body>
</html>
