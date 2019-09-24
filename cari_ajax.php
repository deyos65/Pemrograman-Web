<?php 
require 'functions.php';

$keyword = $_GET['keyword'];
$query_cari = "SELECT * FROM mahasiswa 
               WHERE
               nama LIKE '%$keyword%' OR 
               email LIKE '%keyword%'
               ";

	$mahasiswa = query($query_cari);
 ?>
 <table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No.</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Aksi</th>
		</tr>
         
         <?php if(empty($mahasiswa)) : ?>
         	<tr>
         		<td colspan="6" align="center">Data tidak di temukan</td>
         	</tr>

         <?php endif ; ?>
         	

		<?php $i = 1;foreach ($mahasiswa as $mhs) : ?>
		
		
		<tr>
			<td><?= $i++ ?></td>
			<td><?= $mhs['nrp']     ?></td>
			<td><?= $mhs['nama']    ?></td>
			<td><?= $mhs['email']   ?></td>
			<td><?= $mhs['jurusan'] ?></td>
			<td><a href="ubah.php?id=<?= $mhs['id']; ?> ">Ubah</a> |
			    <a href="hapus.php?id=<?= $mhs['id']; ?>"  onclick="return confirm('yakin?');">Hapus</a></td>
		</tr>
		
	<?php endforeach ; ?> 
	</table>