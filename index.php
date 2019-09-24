<?php
//session
session_start();

if( !isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}
//

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

// methode cari
if( isset($_GET['cari'])) {
	$keyword = $_GET['keyword'];
	$query_cari = "SELECT * FROM mahasiswa
					WHERE
					nama LIKE '%$keyword%'
					OR
					email LIKE '%$keyword%'
				";
	$mahasiswa = query($query_cari);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<a href="logout.php">Logout</a>

	<h3>Daftar Mahasiswa</h3>
	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br></br>


	<form method="get" action="">
		<input type="text" name="keyword" placeholder="masukkan keyword..">
		<button type="submit" name="cari">Cari</button>
	</form>

	<br>

	<label>Urutkan berdasarkan :</label>
	<select id="urutan">
		<option value="nama">Nama</option>
		<option value="nrp">NRP</option>
	</select>

	<div id="container"></div>
	
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No.</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Aksi</th>
		</tr>

		<!-- methode data kosong -->
		<?php  if(empty($mahasiswa)) : ?>
			<tr>
				<td colspan="6" align="center">Data tidak ditemukan!</td>
			</tr>

		<?php endif; ?>
		 <!-- batas -->


		<?php $i = 1;foreach($mahasiswa as $mhs) : ?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $mhs['nrp'] ?></td>
			<td><?= $mhs['nama'] ?></td>
			<td><?= $mhs['email'] ?></td>
			<td><?= $mhs['jurusan'] ?></td>
			<td>
				<a href="ubah.php?id=<?= $mhs['id']; ?>">ubah</a> | 
				<a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('yakin?');">hapus</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	</div>
</body>
</html>