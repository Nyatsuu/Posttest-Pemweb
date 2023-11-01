<?php
session_start(); // Mulai sesi PHP

require 'koneksi.php';
// Fungsi untuk memproses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Validasi dan pengecekan data login di database
    $sql = "SELECT username, password, role FROM account WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Periksa password tanpa hashing (TIDAK DISARANKAN)
        if ($password === $row['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            if ($row['role'] === 'anggota') {
                header("Location: index.php");
                exit();
            } elseif ($row['role'] === 'admin') {
                header("Location: database.php");
                exit();
            }
        } else {
            echo "Kata sandi salah";
        }
    } else {
        echo "Pengguna tidak ditemukan";
    }
}
?>
