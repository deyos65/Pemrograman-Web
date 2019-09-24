<?php 
session_start();

if( !isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



if(isset($_POST['ubah'])) {
	if(ubah($_POST) > 0) {
		echo "<script>
					alert('data berhasil diubah!');
					document.location.href = 'index.php';
					</script>";
	}


}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Ubah Data Mahasiswa</title>
</head>
<body>
	<h3>Form Ubah Data Mahasiswa</h3>

	<form method="post" action="">
		<input type="hidden" name="id" value="<?= $mhs['id']; ?>">
		<ul>
			<li>
				<label>NRP : </label><br>
				<input type="text" name="nrp" required maxlength="9" value="<?= $mhs['nrp']; ?>">
			</li>
			<li>
				<label>Nama : </label><br>
				<input type="text" name="nama" required value="<?= $mhs['nama']; ?>">
			</li>
			<li>
				<label>Email : </label><br>
				<input type="text" name="email" required value="<?= $mhs['email']; ?>">
			</li>
			<li>
				<label>Jurusan : </label><br>
				<input type="text" name="jurusan" required value="<?= $mhs['jurusan']; ?>">
			</li>
			<li>
				<button type="submit" name="ubah">Ubah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>