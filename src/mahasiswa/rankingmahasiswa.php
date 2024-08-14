<?php 
session_start();

if(!$_SESSION['login']){
    header("location:../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/output.css">
</head>

<body>
    <div class="bg-[#171825] p-8  h-screen ">
        <div class="flex bg-[#1D1E2C] h-full rounded-3xl overflow-hidden">
            <section class="bg-[#24263A] w-1/4 pl-8 pt-8">
                <div>
                    <h1 class="text-2xl mb-4 font-bold border-b-2 border-[#1D1E2C] pb-4 mr-8 ">e-SKKM</h1>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="home.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/user.png" width="20">
                        <p>Home</p>
                    </a>
                    <a href="rankingmahasiswa.php" class="flex items-center gap-4 bg-[#1D1E2C] rounded-l-3xl py-2 px-4">
                        <img src="../../public/notepad.png" width="20">
                        <p>Ranking SKKM Mahasiswa</p>
                    </a>
                    <a href="crud/editmhs.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/Vector.png" width="20">
                        <p>Edit</p>
                    </a>
                    <a href="crud/uploadskkm.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/Upload.png" width="20">
                        <p>Upload SKKM</p>
                    </a>
                    <div class="border-b-2 border-[#1D1E2C] pb-4 mr-8"></div>
                    <!-- <a href="datamahasiswa.php">Data Mahasiswa</a>
                    <a href="validasiskkm.php">SKKM</a>
                    <a href="../logout.php">Logout</a> -->
                </div>
                <div class="pt-2">
                    <a href="../logout.php" class="flex items-center gap-4  rounded-l-3xl py-2 px-4">
                        <img src="../../public/log-out.png" width="20">
                        <p>Logout</p>
                    </a>
                </div>
            </section>
            <section class="flex flex-col pl-4 w-full overflow-x-hidden">
                <div class="bg-[#24263A] w-full rounded-bl-3xl flex justify-between items-center px-8 py-4">
                    <?php 
                        echo "
                        <p class='text-xl font-semibold'>Hello, ".$_SESSION["user"]["nama"]."</p>
                        <div class='flex items-center gap-2'>
                            <p>".$_SESSION["user"]["nama"]."</p>
                            <i class='bx bxs-user-circle' style='font-size: 40px;' ></i>
                        </div>
                    
                        "
                    ?>
                </div>
                <section class="my-4 overflow-y-auto mr-4">
                <h2 class="text-2xl font-bold mb-4">Ranking SKKM Mahasiswa</h2>
                    <table class="w-full text-sm text-left rtl:text-right bg-[#24263A] text-[#DBDFEA]">
                        <thead class="text-xs uppercase border-b border-[#1D1E2C]">
                            <tr>
                                <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                    NRP
                                </th>
                                <th scope="col" class="px-20 py-3" style="border: 1px solid #1D1e2C;">
                                    NAMA
                                </th>
                                <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                    JURUSAN
                                </th>
                                <th scope="col" class="px-6 py-3" style="border: 1px solid #1D1e2C;">
                                    SKKM
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../database/koneksi.php';

                            $sqlQuery = "SELECT * FROM mahasiswa ORDER BY skkm DESC LIMIT 10";
                            $result = $conn->query($sqlQuery);
                            $i = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                    <tr class='bg-[#24263A] text-[#DBDFEA] border-y border-[#1D1E2C]'>
                                        <th scope='row' class='px-6 py-4 font-medium border-x border-[#1D1E2C]'>
                                            " . $i . "
                                        </th>
                                        <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                            " . $row["nim"] . "
                                        </td>
                                        <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                            " . $row["nama"] . "
                                        </td>
                                        <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                            " . $row["jurusan"] . "
                                        </td>
                                        <td class='px-6 py-4 border-x border-[#1D1E2C]'>
                                            " . $row["skkm"] . "
                                        </td>
                                    </tr>";
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
