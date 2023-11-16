<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: Pages/userview.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css"> -->
    <link rel="stylesheet" href="./css/style.css ">
    <link rel="stylesheet" href="./css/komen.css ">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <title>COFFEE SHOP</title>
</head>
<body>

<?php include 'Pages/header.php'; ?>

<?php include 'Pages/homepage.php'; ?>

<?php include 'Pages/about.php'; ?>

<?php include 'Pages/products.php'; ?>

<?php include 'Pages/menu.php'; ?>


<?php include 'Pages/komen.php'; ?>

<?php include 'Pages/footer.php'; ?>

<?php echo '<h3 id="harga"> Hay targa</h3>'; ?>

<script src="./js/script.js"></script>
<!-- <script src="./js/cart.js"></script> -->
</body>
</html>