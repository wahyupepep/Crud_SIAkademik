<?php
//memanggil file pustaka fungsi
require "koneksi.php";

//memindahkan data kiriman dari form ke var biasa
$nim=$_POST["nim"];
$nama=$_POST["nama"];
$email=$_POST["email"];
$uploadOk=1;
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Set path folder tempat menyimpan fotonya
$folderupload = "foto/".$foto;

//ambil jenis file
$jenisfilefoto = strtolower(pathinfo($folderupload,PATHINFO_EXTENSION));

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
if($jenisfilefoto != "jpg" && $jenisfilefoto != "png" && $jenisfilefoto != "jpeg"
&& $jenisfilefoto != "gif" ) {
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan<br>";
    $uploadOk = 0;
}

// Check jika terjadi kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
    if (move_uploaded_file($tmp,$folderupload)) {
        //membuat query
		$sql="insert mhs values('','$nim','$nama','$email','$foto')";
		mysqli_query($koneksi,$sql);
		header("location:indexMhs.php");
		//echo "File ". basename( $_FILES["foto"]["name"]). " berhasil diupload";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file foto<br>";
    }
}
