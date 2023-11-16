<?php
$result = str_replace("Rp", "",$_POST["hargainput"]) ;
$result2 = $_POST["namainput"];
echo $result;
echo $result2;

include 'koneksi.php';
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $name = $_POST['nama'];
//     $price = $_POST['price'];
//     $mboh = $_POST['button'];
//     // $css = $_POST['age'];
// }
//     echo $_POST["nama"];
//     echo $_POST["harga"];
//     echo $mboh;  
    // include 'koneksi.php';

    // $result = $conn->query($query);
    $ins_cart = "INSERT INTO cart (name, price, quantity) VALUES ('$result2', '$result', 1)";
    // echo $css;
    if ($conn->query($ins_cart) === true) {
        echo "Kopi berhasil Ditambahkan.";
        header('Location: ../index.php');
    } else {
        echo "Error: " . $ins_cart . "<br>" . $conn->error;
    }

    $conn->close();
?>