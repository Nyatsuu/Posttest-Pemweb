<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'anggota') {
    header("Location: login.php"); 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTTEST 3</title>
    <script src="jQuery.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="popupBox" class="popup">
        <p>Mode telah diubah!</p>
    </div>
    <header>
        <h1 class="judul">WELCOME TO THE COMMUNITY</h1>
    </header>

    <nav>
        <div class="kiri"><b>The Void</b></div>
        <ul>
            <li><a href="#"><b>Home</b></a></li>
            <li><a href="#about"><b>About Me</b></a></li>
            <li><a href="#act"><b>Our Activity</b></a></li>
            <li><a href= "logout.php"><b>Logout</b></a></li>
            <button id="LightMode"><b>Mode</b></button>
        </ul>
    </nav>
    <main>
        <h2 id="pembesar">"THE VOID"</h2>
        <p id="subtitle">Bersama Membangun Negeri</p>
        <div class="home">
            <img src="bunga.jpg" alt="ini bunga" class="bunga">
            <p>THE VOID, jangan menilai buku dari sampulnya, komunitas ini bukan berarti berisikan tentang orang-orang
                suram yang tidak memiliki kehidupan. Tapi komunitas ini bertujuan untuk membantu sesama dari belakang
                layar, seperti membantu masyarakat yang kesulitan layaknya superhero malam.</p>
        </div>
        <hr>
        <h2 id="about">ABOUT ME</h2>
        <div class="tentang">
            <p>Saya Muhammad Adam Fathurrizky sebagai ketua dari komunitas ini, membangun semuanya dari awal karena saya
                merasa sangat prihatin terhadap situasi yang terjadi belakangan ini di negeri kita tercinta ini. Ayo
                mari kita sama-sama bekerja sama saling bersatu saling tolong-menolong antar sesama karena kita sesama
                manusia di dunia ini adalah makhluk yang setara dan saling membutuhkan.</p>
            <img src="keren.JPG" alt="orang ganteng" class="ganteng">
        </div>
        <hr>
        <h2 id="act">OUR ACTIVITY</h2>
        <div class="container_sd">
            <div class="image-container">
                <img width="400px" src="kerja.jpg" alt="Gambar 1">
                <div class="description">Membantu Warga Menangkap Maling</div>
            </div>
            <div class="image-container">
                <img width="450px" src="kota.jpg" alt="Gambar 2">
                <div class="description">Menjaga Dunia Tetap Aman</div>
            </div>
            <div class="image-container">
                <img width="400px" src="sampah.jpg" alt="Gambar 3">
                <div class="description">Membersihkan Sampah</div>
            </div>
        </div>
    </main>

    <form action="proses.php" method="post">
        <h2>Ayo Bergabung!</h2>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat"><br><br>

        <label for="telepon">Nomor Telepon:</label>
        <input type="text" id="telepon" name="telepon"><br><br>

        <input type="submit" value="Kirim">
    </form>

    
    <footer>
        <p id="footer">&copy; 2023 Muhammad Adam Fathurrizky. Leader of THE VOID.</p>
    </footer>

    <script src="javascript.js"></script>
</body>

</html>