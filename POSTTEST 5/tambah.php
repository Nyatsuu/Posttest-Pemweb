<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    // Masukkan data ke dalam tabel (ganti "nama_tabel" dengan nama tabel sesuai database Anda)
    $sql = "INSERT INTO anggota (nama, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";

    if (mysqli_query($conn, $sql)) {
        // Data berhasil ditambahkan, bisa tambahkan pesan sukses atau redirect ke halaman lain jika perlu
        echo "Data berhasil ditambahkan!";
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
    <!-- ... (kode HTML Anda yang lain) ... -->

    <form action="tambah.php" method="post">
        <h2>Ayo Bergabung!</h2>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat"><br><br>

        <label for="telepon">Nomor Telepon:</label>
        <input type="text" id="telepon" name="telepon"><br><br>

        <input type="submit" value="Kirim">
    </form>

    <!-- ... (kode HTML Anda yang lain) ... -->
</body>

</html>
