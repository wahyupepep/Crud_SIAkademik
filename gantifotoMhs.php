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
	<title>SIAkademik:Edit Foto Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">

<body>
	<?php
	//panggil file pustaka fungsi
	require "koneksi.php";

	//buat query
	$id = $_GET['id'];
	$sql = "select * from mhs where id='$id'";
	$hasil = mysqli_query($koneksi, $sql) or die(mysqli_connect_error());
	$row = mysqli_fetch_assoc($hasil);

	//panggil file layout header
	require "head.html";
	?>
	<div class="utama">
		<h2 class="mb-5 text-center">GANTI FOTO MAHASISWA</h2>
		<div class="row">
			<div class="col-sm-4">
				<div class="text-center">
					<img class="img-fluid" src="foto/<?php echo $row['foto'] ?>">
					<p><?php echo $row['nim'] . " - " . $row['nama'] ?></p>
				</div>
			</div>
			<div class="col-sm-8">
				<form class="form-inline" method="post" action="simpanGantifoto.php" enctype="multipart/form-data">
					<input class="form-control mr-2" type="file" name="foto" id="foto">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>