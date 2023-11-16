<?php
// Sertakan file koneksi
require('../CRUD/cartcon.php');
require('../headercart.php');

// Cek apakah parameter id telah diterima
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data kopi berdasarkan id
    $sql = "SELECT * FROM menu WHERE id = $id_products";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Data kopi ditemukan, tambahkan ke dalam keranjang
        $row = $result->fetch_assoc();
        
        $item = [
            'id' => $row['id_products'],
            'namaproducts' => $row['nama_products'],
            'price' => $row['price'],
            'quantity' => 1,
        ];

        // Cek apakah keranjang belanja sudah ada
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Cek apakah item sudah ada di dalam keranjang
        $index = array_search($item['id'], array_column($_SESSION['cart'], 'id'));

        if ($index !== false) {
            // Jika item sudah ada, tambahkan quantity
            $_SESSION['cart'][$index]['quantity']++;
        } else {
            // Jika item belum ada, tambahkan ke dalam keranjang
            $_SESSION['cart'][] = $item;
        }

        // Redirect ke halaman utama
        header('Location: ../index.php');
        exit();
    } else {
        echo "Tidak ada data kopi dengan ID tersebut.";
    }
} else {
    echo "ID kopi tidak valid.";
}

// Tutup koneksi
$conn->close();
?>
