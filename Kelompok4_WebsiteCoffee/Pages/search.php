<?php
session_start();

include 'koneksi.php';

// Ambil kata kunci pencarian dari pengguna
$searchTerm = $_GET['search'];

// Lakukan pencarian produk berdasarkan nama
$sql = "SELECT * FROM menu WHERE name LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Tampilkan hasil pencarian
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['name'] . "</p>";
        // Anda dapat menampilkan informasi produk lainnya di sini
    }
} else {
    echo "Produk tidak ditemukan.";
}

$conn->close();
?>
