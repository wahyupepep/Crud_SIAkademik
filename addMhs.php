<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: forbidden.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>SIAkademik:Tambah Data Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<?php
	require "head.html";
	?>
	<div class="utama">
		<h2 class="mt-4 mb-5 text-center">TAMBAH DATA MAHASISWA</h2>
		<div class="ml-5 mr-5">
			<form method="post" action="query_addMhs.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nim">NIM:</label>
					<input class="form-control" type="text" name="nim" id="nim" required>
				</div>
				<div class="form-group">
					<label for="nama">Nama:</label>
					<input class="form-control" type="text" name="nama" id="nama">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input class="form-control" type="email" name="email" id="email">
				</div>
				<div class="form-group">
					<label for="foto">Foto</label>
					<input class="form-control" type="file" name="foto" id="foto">
				</div>
				<div>
					<button class="btn btn-primary float-right" type="submit" name="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>