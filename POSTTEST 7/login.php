<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Animated Login Form</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="box">
		<form method="post" action="proseslogin.php" autocomplete="off" class="login-form">
			<h2>Login</h2>
			<div class="inputBox">
				<input name="username" type="text" required="required">
				<span>Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input name="password" type="password" required="required">
				<span>Password</span>
				<i></i>
			</div>
			<div class="links">
				<a href="#" onclick="toggleForm('register-form')">Belum punya akun? Segera daftar</a>
			</div>
			<input name="login" type="submit" value="Login">
		</form>

		<form method="post" action="prosesdaftar.php" autocomplete="off" class="register-form" style="display: none;">
			<h2>Daftar</h2>
			<div class="inputBox">
				<input name="username" type="text" required="required">
				<span>Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input name="password" type="password" required="required">
				<span>Password</span>
				<i></i>
			</div>
			<div class="links">
				<a href="#" onclick="toggleForm('login-form')">Sudah punya akun? Login segera</a>
			</div>
			<input name="register" type="submit" value="Daftar">
		</form>
	</div>

	<script>
		function toggleForm(formType) {
			const loginForm = document.querySelector('.login-form');
			const registerForm = document.querySelector('.register-form');

			if (formType === 'login-form') {
				loginForm.style.display = 'block';
				registerForm.style.display = 'none';
			} else if (formType === 'register-form') {
				loginForm.style.display = 'none';
				registerForm.style.display = 'block';
			}
		}
	</script>
</body>
</html>
