<?php 

$conn = mysqli_connect('localhost','root','','pw_153040083');

function query($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}	

	return $rows;
 }

function tambah($data) {
	global $conn;

	$id = $data['id'];
	$nrp = htmlspecialchars($data['nrp']);
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$jurusan = htmlspecialchars($data['jurusan']);

	$query = "INSERT INTO mahasiswa
				VALUES
				('', '$nrp', '$nama', '$email', '$jurusan')";

	mysqli_query($conn, "$query");

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data['id'];
	$nrp = htmlspecialchars($data['nrp']);
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$jurusan = htmlspecialchars($data['jurusan']);

	$query = "UPDATE mahasiswa SET
					nama = '$nrp',
					nama = '$nama',
					email = '$email',
					jurusan = '$jurusan'
					

			WHERE id = $id
					";

	mysqli_query($conn, "$query");

	return mysqli_affected_rows($conn);
}


function registrasi($data) {
	global $conn;
	$username = $data['username'];
	$password1 = $data['password1'];
	$password2 = $data['password2'];

	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	//jika sudah ada username terdaftar
	if( mysqli_num_rows($cek_user) > 0) {
		echo "<script>
				alert('username sudah terdaftar');
				document.location.href = 'registrasi.php';
			  </script>";
		return false;
	}

	// jika pssword 1 tdk sama dgn password2
	if( $password1 != $password2) {
		echo "<script>
				alert('Konfirmasi password salah!');
				document.location.href = 'registrasi.php';
			  </script>";
			  return false;
	}
	$password = password_hash($password1, PASSWORD_DEFAULT);
	$query = "INSERT INTO user VALUES
					('', '$username', '$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


 ?>
