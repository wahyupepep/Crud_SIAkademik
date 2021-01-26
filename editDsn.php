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
	<title>SIAkademik:Edit Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php
	require "koneksi.php";
	require "head.html";

	$npp = $_GET['kode'];
	$sql = "select * from dosen where npp='$npp'";
	$qry = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($qry);
	?>

	<div class="utama">
		<h2 class="mt-4 mb-5 text-center">Edit Data Dosen</h2>
		<div class="ml-5 mr-5">
			<form method="post" action="query_editDsn.php">
				<div class="form-group">
					<label for="npp">NPP</label>
					<input class="form-control" readonly type="text" name="npp" id="npp" value="<?php echo $row['npp'] ?>">
				</div>
				<div class="form-group">
					<label for="nama_dosen">Nama Dosen </label>
					<input class="form-control" type="text" name="nama_dosen" id="nama_dosen" value="<?php echo $row['nama_dosen'] ?>">
				</div>
				<div class="form-group">
					<label>Home Base</label>
					<select name="homebase" class="form-control" name="homebase" id="homebase">
						<option>Pilih Home Base</option>
						<option value="A11 " <?php if ($row['homebase'] == 'A11') { ?> selected <?php } ?>>A11</option>
						<option value="A12 " <?php if ($row['homebase'] == 'A12') { ?> selected <?php } ?>>A12</option>
						<option value="A14 " <?php if ($row['homebase'] == 'A14') { ?> selected <?php } ?>>A14</option>
					</select>
				</div>
				<div>
					<button class="btn btn-primary float-right" type="submit">Simpan</button>
				</div>
				<input type="hidden" name="npp" value="<?php echo $npp ?>">
			</form>
		</div>
	</div>
</body>

</html>