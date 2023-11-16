<?php
// Fungsi untuk membersihkan input pengguna
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Fungsi untuk menampilkan pesan kesalahan dengan menggunakan JavaScript
function display_error($message) {
    echo "<script>alert('$message');</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan bersihkan nilai dari formulir
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $comment = clean_input($_POST['comment']);

    // Validasi data
    $error_message = "";
    if (empty($name) || empty($email) || empty($comment)) {
        $error_message .= "Semua field harus diisi";
    }

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message .= "Format email tidak valid";
    }

    // Jika tidak ada kesalahan, simpan data ke dalam database
    if (empty($error_message)) {
        include 'koneksi.php';

        // Persiapkan dan jalankan query SQL untuk menyimpan data ke dalam database
        $insert_query = "INSERT INTO komen (name, email, comment) VALUES ('$name', '$email', '$comment')";

        if ($conn->query($insert_query) === TRUE) {
            echo "<script>alert('Komentar berhasil dikirim. Terima kasih atas masukan Anda!'); window.location.href='../index.php';</script>";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    } else {
        echo "<div style='color: red;'>$error_message</div>";
    }

    // Tutup koneksi
    $conn->close();
}
?>
