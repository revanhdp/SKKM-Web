<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style type="text/css">
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .card {
            width: 40%;
            box-sizing: border-box;
            margin: auto;
        }

        form {
            height: 280px;
            padding: 20px;
            box-sizing: border-box;
        }

        input,
        button {
            width: 100%;
            height: auto;
            padding: 15px;
            font-size: 20px;
            box-sizing: border-box;
            margin-bottom: 20px;
            border: 1px solid #333;
            border-radius: 8px;
            background-color:#F3F3F3;
            padding: 10px 20px;
        }

        h1 {
            text-align: center;
            color: black;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-2">
            <!-- <h1>Login Form</h1> -->
            <i class='bx bxs-user-circle' style='font-size:80px; text-align:center; color:#86B6F6; padding: 20px'></i>
            <form action="cek_login.php" method="POST" style="display:flex;flex-direction:column;position:relative" autocomplete="off">
                <div style="margin-top:20px;">
                    <input type="text" name="username" placeholder="username">
                    <input type="password" name="pass" placeholder="password">
                </div>
                
                <div style="flex:1;display:flex;flex-direction:column;justify-content:end">
                    <label style="text-align:center;width:100%">Login As Admin</label>
                    <input type="checkbox" name="admin">
                </div>
                </input>
                <input type="submit" class="btn btn-success" style="position:absolute;bottom:-25px;left:0px;right:0px;width:220px;margin:auto;background-color:#86B6F6">
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
    </div>
</body>
</html>
