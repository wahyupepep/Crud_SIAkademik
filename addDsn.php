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
	<title>SIAkademik:Tambah Data Dosen</title>
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
		<h2 class="mt-4 mb-5 text-center">TAMBAH DATA DOSEN</h2>
		<div class="ml-5 mr-5">
			<form method="post" action="query_addDsn.php">
				<div class="form-group">
					<label for="npp">NPP:</label>
					<input class="form-control" type="text" name="npp" id="npp" required>
				</div>
				<div class="form-group">
					<label for="nama_dosen">Nama Dosen:</label>
					<input class="form-control" type="text" name="nama_dosen" id="nama_dosen">
				</div>
				<div class="form-group">
					<label>Home Base</label>
					<select name="homebase" id="homebase" class="form-control">
						<option value="">-- Pilih Home Base --</option>
						<option value="A11 ">A11</option>
						<option value="A12 ">A12</option>
						<option value="A14 ">A14</option>
					</select>
				</div>
				<div>
					<button class="btn btn-primary float-right" type="submit" name="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>