<?php
include 'koneksi.php';

// Persiapkan dan jalankan query SQL untuk mengambil data komentar dari database
$select_query = "SELECT name, comment FROM komen";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {
    echo "<div id='review-komentar'>";
    echo "<ul>";

    // Loop untuk menampilkan setiap komentar
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $comment = $row['comment'];

        echo "<li><strong>$name:</strong> $comment</li>";
    }

    echo "</ul>";
    echo "</div>";
} else {
    echo "<p>Belum ada komentar</p>";
}

// Tutup koneksi
$conn->close();
?>