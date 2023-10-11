<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    // Lakukan pemrosesan data di sini (misalnya, simpan ke database atau tampilkan)
    echo "Nama: " . $nama . "<br>";
    echo "Alamat: " . $alamat . "<br>";
    echo "Nomor Telepon: " . $telepon . "<br>";
}
?>