<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $namaBaru = $_POST["nama"];
    $alamatBaru = $_POST["alamat"];
    $teleponBaru = $_POST["notelp"];

    // Query update data (ganti "anggota" dengan nama tabel sesuai database Anda)
    $sql_update = "UPDATE anggota SET nama='$namaBaru', alamat='$alamatBaru', notelp='$teleponBaru' WHERE id=$edit_id";

    if (mysqli_query($conn, $sql_update)) {
        // Data berhasil diupdate, alihkan kembali ke halaman ini
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>