<?php
include 'koneksi.php';

$sql = "SELECT id, nameproducts, price, foto FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        echo $row["id"];
        echo $row['nameproducts'];
        echo $row["price"];
        // $foto = '<img src="'.$row["foto"].'" alt="">';
        echo '<img src=".'.$row["foto"].'" alt="">';
        // '<img src="'.$foto.'">
    };
};
?>