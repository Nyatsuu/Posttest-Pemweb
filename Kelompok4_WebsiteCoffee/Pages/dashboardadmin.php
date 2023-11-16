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
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
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
                <a href="dashboardmenu.php">
					<i class="fa fa-coffee icon" style="font-size: 22px;"></i>
					<div class="sidebarText">Data Menu</div>
				</a>
            </li>
        </ul>
    </nav>
<div class="container">
    <section class="tambah">
        <div class="content">
            <h2>Tambah User</h2>
            <form method="post" action="admin.php">
                <label for="new_username">Username</label>
                <input type="text" name="new_username" placeholder="Username Baru" id="new_username" required>
                <label for="new_name">Name</label>
                <input type="text" name="new_name" placeholder="Nama baru" id="new_name" required>
                <label for="new_password">Password</label>
                <input type="password" name="new_password" placeholder="Password Baru" id="new_password" required>
                <button type="submit" name="submit">Tambah</button>
            </form>
        </div>
    </section>
</div>
    
    <div class="contable">
    <h3>Data User</h3>
    <table border="2" align="center">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $query = "SELECT * FROM registrasi";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            if ($row['username'] === 'admin' && $row['password'] === 'admin') {
                continue;
            } else {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo '<td>
                    <form method="post" action="admin.php">
                        <input type="hidden" name="user_id" value="'. $row['id'] . '">
                        <input type="text" name="new_username" placeholder="Edit Username" required>
                        <input type="text" name="new_name" placeholder="Edit Nama" required>
                        <input type="password" name="new_password" placeholder="Edit Password"required>
                        <button type="submit" name="update">Edit</button>
                        <button type="submit" name="delete">Hapus</button>
                    </form>
                </td>';
            echo "</tr>";
        }
    }
        ?>
    </table>
    </div>
</body>

<?php include 'footer.php'; ?>
</html>