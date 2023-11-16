<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $newNameproducts = $_POST['new_nameprod'];
    $newPrice = $_POST['new_price'];

    if ($_FILES['new_foto']['error'] == UPLOAD_ERR_OK) {
        $fotoName = $_FILES['new_foto']['name'];
        $fotoTmpName = $_FILES['new_foto']['tmp_name'];

        $fotoPath = './images/' . $fotoName;

        move_uploaded_file($fotoTmpName, $fotoPath);
    } else {
        $fotoPath = null;
    }

    $insert_query = "INSERT INTO menu (nameproducts, price, foto) VALUES ('$newNameproducts', '$newPrice', '$fotoPath')";

    if ($conn->query($insert_query) === true) {
        header('Location: dashboardadmin.php');
        exit;
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $productsId = $_POST['products_id'];

    $delete_query = "DELETE FROM menu WHERE id = $productsId";

    if ($conn->query($delete_query) === true) {
        header('Location: dashboardadmin.php');
        exit;
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}
?>
