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
	<title>SIAkademik:Edit Data Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<?php
	require "koneksi.php";
	require "head.html";
	$id = $_GET['kode'];
	$sql = "select * from mhs where id='$id'";
	$qry = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-5 mt-4 text-center">EDIT DATA MAHASISWA</h2>
		<div class="row ml-3">
			<div class="col-sm-3 text-center">
				<img class="rounded img-thumbnail" src="foto/<?php echo $row['foto'] ?>">
				<div>
					[ <a href="gantiFotoMhs.php?id=<?php echo $row['id'] ?>">Ganti Foto</a> ]
				</div>
			</div>
			<div class="col-sm-8">
				<form enctype="multipart/form-data" method="post" action="query_editMhs.php">
					<div class="form-group">
						<label for="nim">NIM:</label>
						<input class="form-control" type="text" name="nim" id="nim" value="<?php echo $row['nim'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row['nama'] ?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
					</div>
					<div>
						<button class="btn btn-primary float-right" type="submit">Simpan</button>
					</div>
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</form>
			</div>
		</div>
	</div>
</body>

</html>