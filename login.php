<?php 
// session
session_start();
if( isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
}
//...
require 'functions.php';


if( isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM user WHERE 
					username = '$username'";

	$cek_user = mysqli_query($conn, $query);

	if( mysqli_num_rows($cek_user) == 1) {
		// cek password
		$user = mysqli_fetch_assoc($cek_user);
		if( password_verify($password, $user['password'])) {
			// ok, login
			$_SESSION['username'] = $username;
			header("Location: index.php");
			exit;

		} else {
			// password salah
			$error = 'password salah!';		
		}

	} else {
		// gagal login
		$error = 'username belum terdaftar!';
	}
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>

	<?php if( isset($error)) : ?>
	<p style="color: red; font-style: italic;"><?= $error; ?></p>
	<?php endif; ?>

	<form action="" method="post">
		<ul>
			<li>
				<label>Username</label><br>
				<input type="text" name="username">
			</li>
			<li>
				<label>Password</label><br>
				<input type="text" name="password">
			</li>
			<li>
				<br>
				<button type="submit" name="login">Login</button>
			</li>
		</ul>
	</form>

	<a href="registrasi.php">Registrasi</a>
</body>
</html>