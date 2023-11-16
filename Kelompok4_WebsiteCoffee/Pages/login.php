<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SILAHKAN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="proseslogin.php" method="post">
                <h1>LOGIN</h1>
                <hr>
                <p>Kohi D,Orange</p>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required placeholder="Masukkan username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Masukkan password">
                <button>Login</button>
                <p>Belum Punya Akun?    
                <a href="regis.php">Register</a></p>
            </form>
        </div>
        <div class="right">
            <img src="../images/logo.png" alt="">
        </div>
    </div>
</body>
</html>