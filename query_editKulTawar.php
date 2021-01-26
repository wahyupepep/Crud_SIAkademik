<?php
include "koneksi.php";
$idkultawar=$_POST['idkultawar'];
$id_matkul=$_POST['id_matkul'];
$npp=$_POST['npp'];
$klp=$_POST['klp'];
$hari=$_POST['hari'];
$jamkul=$_POST['jamkul'];
$ruang=$_POST['ruang'];
$sql="update kultawar set id_matkul = '$id_matkul',
						  npp      = '$npp',
						  klp      = '$klp',
						  hari     = '$hari',
						  jamkul   = '$jamkul',
						  ruang    = '$ruang'
						  where  idkultawar='$idkultawar'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:indexTawar.php");
?>