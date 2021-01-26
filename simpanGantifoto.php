<?php
//panggil file fungsi
require "koneksi.php";

$id = $_POST['id'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];


//Set lokasi dan nama file foto
//$folderupload ="foto/";

$folderupload = "foto/" . $foto;

//$fileupload = $folderupload . basename($_FILES['foto']['name']);
$jenisfilefoto = strtolower(pathinfo($folderupload, PATHINFO_EXTENSION));
$uploadOk = 1;

//ambil jenis file
//$jenisfilefoto = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION));


// Check jika file foto sudah ada
if (file_exists($folderupload)) {
	echo "Maaf, file foto sudah ada<br>";
	$uploadOk = 0;
}

// Check ukuran file
if ($_FILES["foto"]["size"] > 1000000) {
	echo "Maaf, ukuran file foto harus kurang dari 1 MB<br>";
	$uploadOk = 0;
}

// Hanya file tertentu yang dapat digunakan
if (
	$jenisfilefoto != "jpg" && $jenisfilefoto != "png" && $jenisfilefoto != "jpeg"
	&& $jenisfilefoto != "gif"
) {
	echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan<br>";
	$uploadOk = 0;
}

// Check jika terjadi kesalahan
if ($uploadOk == 0) {
	echo "Maaf, file tidak dapat terupload<br>";
	// jika semua berjalan lancar
} else {
	if (move_uploaded_file($tmp, $folderupload)) {
		//membuat query
		//echo $id." - ".$fileupload;exit;
		$sql = "update mhs set foto='$foto' where id='$id'";
		mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
		header("location:indexMhs.php");
	} else {
		echo "Maaf, terjadi kesalahan saat mengupload file foto<br>";
	}
}
