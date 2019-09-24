<?php 
require 'functions.php';

if( isset($_POST['registrasi'])) {
	if( registrasi($_POST) > 0) {
		echo "<script>
				alert('Registrasi Berhasil!');
				document.location.href = 'login.php';
			  </script>";
	}
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Registrasi</title>
</head>
<body>

	<h2>Form Registrasi</h2>
	
	<form action="" method="post">
		<ul>
			<li>
				<label>Username :</label><br>
				<input type="text" name="username" required>
			</li>
			<li>
				<label>Password :</label><br>
				<input type="password" name="password1" required>
			</li>
			<li>
				<label>Konfirmasi Password</label><br>
				<input type="password" name="password2" required>
			</li>
			<li>
				<br>
				<button type="submit" name="registrasi">Registrasi</button>
			</li>
		</ul>
	</form>
</body>
</html>