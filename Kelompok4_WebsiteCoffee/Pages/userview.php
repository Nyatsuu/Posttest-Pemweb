
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css"> -->
    <link rel="stylesheet" href="../css/style.css ">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/komen.css">
    <title>COFFEE</title>
</head>
<body>

<!-- HEADER DIMULAI -->
<header class="header">
    <div class="logo">
        <img src="../images/logo.png" alt="">
    </div>

    <nav class="navbar">
        <a href="#home"><strong>home</strong></a>
        <a href="#menu"><strong>menu</strong></a>
        <a href="#products"><strong>products</strong></a>
        <a href="#about"><strong>about</strong></a>
        <a href="#komen"><strong>review</strong></a>
        <!-- <a href="login.php"><strong class="fas fa-user"></strong></a> -->
    </nav>

    <div class="icons">
        <!-- <div class="fas fa-search" id="search-btn"></div> -->
        <div class="fas fa-bars" id="menu-btn"></div>
        <a href="login.php"> <div class="fas fa-user"></div>
        </a>
    </div>

</header>

<!-- HEADER SELESAI -->


<!-- HOME PAGE UTAMA -->

<section class="home" id="home">

    <div class="content">
        <h3>Kopi Segar Pagi Hari</h3>
        <p>Pagi? Bangun tidur sehabis mengejar deadline yang kejam adalah suatu hal yang sangat menyenangkan. Tapi bagaimana jika ditemani oleh segelas Kopi yang nikmat? bukankah lebih menyenangkan? maka dari itu nikmati segelas KOHI D'ORANGE agar memberi warna di pagi hari mu. </p>
        <a href="#menu" class="btn">Pesan Sekarang</a>
    </div>

</section>

<!-- HOME PAGE SELESAI -->

<!-- PRODUCTS -->

<section class="products" id="products">

    <h1 class="heading"> best <span>seller</span> </h1>

    <div class="box-container">
        <div class="box">
            <div class="icons">
                <a href="login.php" class="fas fa-shopping-cart"></a>
                <!-- <a href="#nothing" class="fas fa-heart"></a> -->
                <a href="#menu" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="../images/Latte.png" alt="">
            </div>
            <div class="content">
                <h3>Coffee Latte</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">Rp 27.000 <span>Rp 35.000</span></div>
            </div>
        </div>
        <div class="box">
            <div class="icons">
                <a href="login.php" class="fas fa-shopping-cart"></a>
                <!-- <a href="#nothing" class="fas fa-heart"></a> -->
                <a href="#menu" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="../images/americano.png" alt="">
            </div>
            <div class="content">
                <h3>Americano</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">Rp 22.000 <span>Rp 29.000</span></div>
            </div>
        </div>
        <div class="box">
            <div class="icons">
                <a href="login.php" class="fas fa-shopping-cart"></a>
                <!-- <a href="#nothing" class="fas fa-heart"></a> -->
                <a href="#menu" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="../images/Affogato.png" alt="">
            </div>
            <div class="content">
                <h3>Affogato</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">Rp 31.000 <span>Rp 39.900</span></div>
            </div>
        </div>
    </div>

</section>

<!-- PRODUCTS SELESAI -->


<!-- MENU  -->

<section class="menu" id="menu">
    <h1 class="heading"><span>menu</span></h1>
    <div class="box-container">

        <?php
        // Database connection parameters
        include 'koneksi.php';

        // Fetch menu items from the database
        $select_query = "SELECT id, nameproducts, price, foto FROM menu";
        $result = $conn->query($select_query);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="box">';
                echo '<img src=".'.$row["foto"].'" alt="">';
                echo '<h3>' . $row["nameproducts"] . '</h3>';
                echo '<div class="price">Rp ' . $row["price"] . '</div>';
                echo '<button <a href="login.php" class="btn"> Login For More... </button>';
                echo '</div>';
            }
        } else {
            echo '<p class="error">Menu is currently empty.</p>';
        }

        $conn->close();
        ?>

    </div>
</section>

<!-- MENU SELESAI -->

<!-- ABOUT -->

<section class="about" id="about">

    <h1 class="heading"><span>about</span> us </h1>

    <div class="row">
        <div class="image">
            <img src="../images/frappe.png" alt="">
        </div>

        <div class="content">
            <h3>Apa Yang Membuat Kopi Kami Spesial?</h3>
            <p>Segelas kopi kami dibuat dengan Beans berkualitas. Dengan menggunakan Beans Arabica maka ketika anda meminumnya, Maka tidak membuat perut anda merasa tidak nyaman. Dengan diberi susu segar di setiap gelas kopi kami, maka akan membuat Taste yang tidak Over Creamy.</p>
            <p>Tentu saja dengan Beans berkualitas dan Susu yang segar tidak menjamin secangkir kopi akan nikmat. Secangkir kopi akan nikmat jika dibuat ditangan Barista yang sangat berpengalaman. Maka dari itu di KOHI D'ORANGE kopi dibuat oleh Barista berpengalaman dan bersertifikat. Maka dari itu, Dengan bahan berkualitas dan Barista yang sangat berbakat. Secangkir kopi di cafe kami memiliki rasa yang tidak mengecewakan.</p>
            <a href="#" class="btn">Selengkapnya</a>
        </div>
    </div>
</section>

<!-- ABOUT SELESAI -->


<!-- KOMENTAR -->
<section id="komen">
    <div class="container">
        <!-- Tambahkan bagian "Review Komentar" -->
        <div id="review-komentar">
            <h3>Review Komentar</h3>
            <?php
            include 'tampilkomentar.php'; // Include file yang menampilkan komentar
            ?>
        </div>
    </div>
</section>
<!-- KOMENTAR SELESAI -->






<?php include 'footer.php'; ?>




<script src="../js/script.js"></script>
</body>
</html>