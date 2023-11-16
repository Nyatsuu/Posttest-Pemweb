<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="viewport" content="width=device-width, initial-scale=1">
	<title>DASHBOARD ADMIN</title>
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/adminproduk.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header class="header">
    <div class="logo">
        <img src="../images/logo.png" alt="">
    </div>

    <nav class="dasmin-center">
        <h1>DASHBOARD ADMIN</h1>
    </nav>

    <nav class="navbar">
        <a href="logout.php"><strong>Logout</strong></a>
    </nav>
</header>

<body>
<nav class="sidebar">
        <ul>
            <li class="item">
                <a href="dashboardadmin.php">
					<i class="fa fa-address-book-o icon" style="font-size: 24px;"></i>
					<div class="sidebarText">Data User</div>
				</a>
            </li>
			<li class="item">
                <a href="datamenu.php">
					<i class="fa fa-coffee icon" style="font-size: 22px;"></i>
					<div class="sidebarText">Data Menu</div>
				</a>
            </li>
        </ul>
    </nav>
<div class="container">
    <section class="tambah">
        <div class="content">
            <h2>Tambah Menu Produk</h2>
            <form method="post" action="adminproduk.php" enctype="multipart/form-data">

            <label for="new_nameprod">Nama Kopi</label>
            <input type="text" name="new_nameprod" placeholder="Nama Kopi Baru" id="new_nameprod" required>

            <label for="new_price">Harga</label>
            <input type="number" name="new_price" placeholder="Harga baru" id="new_price" required>

            <label for="new_foto">Foto</label>
            <input type="file" name="new_foto" id="new_foto" required accept="image/*">

            <button type="submit" name="submit">Tambah</button>
            </form>
        </div>
    </section>
</div>

<div class="contable">
    <h3>Data Menu Produk</h3>
    <table border="2" align="center">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        include 'koneksi.php';
        $query = "SELECT * FROM menu";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nameproducts'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            
            if (!empty($row['foto'])) {
                echo '<td><img src=".' . $row['foto'] . '" alt=""></td>';
            } else {
                echo "<td>Tidak ada foto</td>";
            }
            
            echo '<td>
                <form method="post" action="adminproduk.php">
                    <input type="hidden" name="products_id" value="' . $row['id'] . '">
                    <button type="submit" name="delete">Hapus Menu</button>
                </form>
            </td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>

<?php include 'footer.php'; ?>
</html>