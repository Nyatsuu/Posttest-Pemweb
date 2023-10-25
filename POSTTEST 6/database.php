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
    if (isset($_POST['tambah']) || isset($_POST['update'])) {
        // Mengambil data dari input form
        $namaBaru = $_POST["nama"];
        $alamatBaru = $_POST["alamat"];
        $teleponBaru = $_POST["notelp"];

        // Mengelola upload gambar
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        // Ubah nama file menjadi format yang diinginkan: yyyy-mm-dd-nama-file.ekstensi
        $namaFile = date("Y-m-d") . '-' . str_replace(' ', '-', $gambar);
        move_uploaded_file($temp, 'gambar_anggota/' . $namaFile);

        if (isset($_POST['tambah'])) {
            // Kode untuk menambah data baru
            $sql = "INSERT INTO anggota (nama, alamat, notelp, gambar) VALUES ('$namaBaru', '$alamatBaru', '$teleponBaru', '$namaFile')";
        } elseif (isset($_POST['update'])) {
            // Kode untuk mengupdate data
            $idToUpdate = $_POST["edit_id"];
            $sql = "UPDATE anggota SET nama='$namaBaru', alamat='$alamatBaru', notelp='$teleponBaru', gambar='$namaFile' WHERE id=$idToUpdate";
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database - Staff</title>
</head>
<link rel="stylesheet" href="admin.css">

<body>
    <h1 class="title">Data Anggota | <a class="test1" href="index.php">Kembali Menu Awal</a></h1>
    <div class="waktu">
        <?php
        date_default_timezone_set("Asia/Makassar"); // Mengatur zona waktu

        $hari = date("l");
        $tanggal = date("d");
        $bulan = date("F");
        $tahun = date("Y");
        $zonaWaktu = date("T");
        ?>

        <p>Hari: <span id="hari"><?php echo $hari; ?></span></p>
        <p>Tanggal: <span id="tanggal"><?php echo $tanggal; ?></span> <span id="bulan"><?php echo $bulan; ?></span> <span id="tahun"><?php echo $tahun; ?></span></p>
        <p>Zona Waktu: <span id="zona-waktu"><?php echo $zonaWaktu; ?></span></p>
    </div>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM anggota");

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['notelp']; ?></td>
                <td><img src="gambar_anggota/<?php echo $row['gambar']; ?>" alt="Gambar Anggota" height="100" width="100"></td>
                <td>
                    <a href="database.php?edit_id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="database.php?delete_id=<?php echo $row['id']; ?>">Hapus</a>
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
    <form class="test" method="post" action="" enctype="multipart/form-data">
        <?php if (isset($data_edit)) : ?>
            <input type="hidden" name="edit_id" value="<?php echo $data_edit['id']; ?>">
        <?php endif; ?>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo isset($data_edit) ? $data_edit['nama'] : ''; ?>" required><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo isset($data_edit) ? $data_edit['alamat'] : ''; ?>" required><br><br>

        <label for="notelp">Nomor Telepon:</label>
        <input type="text" id="notelp" name="notelp" value="<?php echo isset($data_edit) ? $data_edit['notelp'] : ''; ?>" required><br><br>

        <label for="gambar">Foto Diri:</label>
        <input type="file" id="gambar" name="gambar" onchange="showPreview(event)"><br><br>

        <img class="custom-file-upload" id="preview" src="#" alt="Pratinjau Gambar" style="display: none; max-width: 200px; margin-top: 10px;">


        <button type="submit" name="<?php echo isset($data_edit) ? 'update' : 'tambah'; ?>">
            <?php echo isset($data_edit) ? 'Update' : 'Tambah'; ?>
        </button>
        <?php if (isset($data_edit)) : ?>
            <button><a href="database.php">Kembali</a></button>
        <?php endif; ?>
    </form>


    <script>
        // Menampilkan foto sebelum submit datanya
        function showPreview(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];
            var reader = new FileReader();

            var previewElement = document.getElementById("preview");
            previewElement.style.display = "block";

            reader.onload = function(e) {
                previewElement.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    </script>
</body>

</html>