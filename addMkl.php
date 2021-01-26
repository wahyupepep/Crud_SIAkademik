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
	<title>SIAkademik:Tambah Data Mata Kuliah</title>
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
		<h2 class="mt-4 mb-5 text-center text-uppercase">TAMBAH DATA Mata Kuliah</h2>
		<div class="ml-5 mr-5">
			<form method="post" action="query_addMkl.php">
				<div class="form-group">
					<label for="id_matkul">Kode Matkul:</label>
					<input class="form-control" type="text" name="id_matkul" id="id_matkul" required>
				</div>
				<div class="form-group">
					<label for="nama_matkul">Nama Matkul:</label>
					<input class="form-control" type="text" name="nama_matkul" id="nama_matkul">
				</div>
				<div class="form-group">
					<label for="sks">SKS:</label>
					<input class="form-control" type="text" name="sks" id="sks">
				</div>
				<div class="form-group">
					<label>Jenis:</label>
					<select name="jenis" id="jenis" class="form-control">
						<option value="">-- Pilih JENIS MATA KULIAH --</option>
						<option value="T ">T</option>
						<option value="P ">P</option>
						<option value="T/P ">T/P</option>
					</select>
				</div>
				<div class="form-group">
					<label for="semester">Semester:</label>
					<input class="form-control" type="text" name="semester" id="semester">
				</div>
				<div>
					<button class="btn btn-primary float-right" type="submit" name="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>