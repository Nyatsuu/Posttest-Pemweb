<?php
require 'koneksi.php';

// Ambil data dari database (ganti "anggota" dengan nama tabel sesuai database Anda)
$result = mysqli_query($conn, "SELECT * FROM anggota");

$anggota = [];

while ($row = mysqli_fetch_assoc($result)) {
    $anggota[] = $row;
}



// Menghapus data jika parameter "id" diterima
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    // Query hapus data berdasarkan ID (ganti "anggota" dengan nama tabel sesuai database Anda)
    $sql_delete = "DELETE FROM anggota WHERE id=$id";
    if (mysqli_query($conn, $sql_delete)) {
        // Data berhasil dihapus, alihkan kembali ke halaman ini
        header("Location: database.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Mengambil data untuk form edit jika parameter "edit_id" diterima
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    // Query ambil data berdasarkan ID (ganti "anggota" dengan nama tabel sesuai database Anda)
    $sql_edit = "SELECT * FROM anggota WHERE id=$edit_id";
    $result_edit = mysqli_query($conn, $sql_edit);
    $data_edit = mysqli_fetch_assoc($result_edit);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        // Kode untuk menambah data baru
        $namaBaru = $_POST["nama"];
        $alamatBaru = $_POST["alamat"];
        $teleponBaru = $_POST["notelp"];
        $sql = "INSERT INTO anggota (nama, alamat, notelp) VALUES ('$namaBaru', '$alamatBaru', '$teleponBaru')";
    } elseif (isset($_POST['update'])) {
        // Kode untuk mengupdate data
        $idToUpdate = $_POST["edit_id"];
        $namaBaru = $_POST["nama"];
        $alamatBaru = $_POST["alamat"];
        $teleponBaru = $_POST["notelp"];
        $sql = "UPDATE anggota SET nama='$namaBaru', alamat='$alamatBaru', notelp='$teleponBaru' WHERE id=$idToUpdate";
    }

    if (mysqli_query($conn, $sql)) {
        // Data berhasil ditambahkan atau diupdate, refresh halaman
        header('Location: database.php');
        exit();
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
    <title>Database - Staff</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<link rel="stylesheet" href="admin.css">

<body>
    <h1 class="title">Data Anggota | <a class="test1" href="index.php">Kembali Menu Awal</a></h1>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($anggota as $data) { ?>
            <tr>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['notelp']; ?></td>
                <td>
                    <a href="database.php?edit_id=<?php echo $data['id']; ?>">Edit</a> |
                    <a href="database.php?delete_id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2 class="animated-title">
        <?php if (isset($data_edit)) : ?>
            Edit Data Anggota
        <?php else : ?>
            Tambah Data Anggota Baru
        <?php endif; ?>
    </h2>
    <form class="test" method="post" action="">
        <?php if (isset($data_edit)) : ?>
            <input type="hidden" name="edit_id" value="<?php echo $data_edit['id']; ?>">
        <?php endif; ?>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo isset($data_edit) ? $data_edit['nama'] : ''; ?>" required><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo isset($data_edit) ? $data_edit['alamat'] : ''; ?>" required><br><br>

        <label for="notelp">Nomor Telepon:</label>
        <input type="text" id="notelp" name="notelp" value="<?php echo isset($data_edit) ? $data_edit['notelp'] : ''; ?>" required><br><br>

        <button type="submit" name="<?php echo isset($data_edit) ? 'update' : 'tambah'; ?>" >
            <?php echo isset($data_edit) ? 'Update' : 'Tambah'; ?>
        </button>
        <?php if (isset($data_edit)) : ?>
            <button><a href="database.php">Kembali</a></button>
        <?php endif; ?>
    </form>

    <!-- ... (kode HTML Anda yang lain) ... -->
</body>

</html>