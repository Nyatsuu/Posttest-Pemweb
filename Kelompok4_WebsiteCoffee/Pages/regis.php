<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGISTRASI</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>
    <div class="container">
        <div class="regis">
            <form action="prosesdaftar.php" method="post">
                <h1>REGISTER</h1>
                <hr>
                <p>Kohi D,Orange</p>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required placeholder="Masukkan Username Baru">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" required placeholder="Masukkan Nama Baru">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Masukkan Password Baru">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required placeholder="Konfirmasi Password">
                <button>Register</button>
                <p>Sudah Punya Akun?    
                <a href="login.php">Login</a></p>
            </form>
        </div>
        <div class="right">
            <img src="../images/logo.png" alt="">
        </div>
    </div>
</body>
</html>