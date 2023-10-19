<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    // Masukkan data ke dalam tabel (ganti "nama_tabel" dengan nama tabel sesuai database Anda)
    $sql = "INSERT INTO anggota (nama, alamat, notelp) VALUES ('$nama', '$alamat', '$telepon')";

    if (mysqli_query($conn, $sql)) {
        // Data berhasil ditambahkan, bisa tambahkan pesan sukses atau redirect ke halaman lain jika perlu
        echo '<script>alert("Pendaftaran berhasil!"); window.location.href = "index.php";</script>';
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>