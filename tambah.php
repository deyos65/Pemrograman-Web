<?php 

session_start();

if( !isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

if(isset($_POST['tambah'])) {
	if(tambah($_POST) > 0) {
		echo "<script>
					alert('data berhasil ditambahkan');
					document.location.href = 'index.php';
					</script>";
	}


}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah Data Mahasiswa</title>
</head>
<body>
	<h3>Form Tambah Data Mahasiswa</h3>

	<form method="post" action="">
		<ul>
			<li>
				<label>NRP : </label><br>
				<input type="text" name="nrp" required>
			</li>
			<li>
				<label>Nama : </label><br>
				<input type="text" name="nama" required>
			</li>
			<li>
				<label>Email : </label><br>
				<input type="text" name="email" required>
			</li>
			<li>
				<label>Jurusan : </label><br>
				<input type="text" name="jurusan" required>
			</li>
			<li>
				<button type="submit" name="tambah">Tambah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>