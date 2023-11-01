<?php

require 'koneksi.php';

// Fungsi untuk memproses pendaftaran
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Validasi dan penyimpanan data pendaftaran ke database
    $role = 'anggota'; // Gantilah dengan peran sebenarnya dari pengguna
    $sql = "INSERT INTO account (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
