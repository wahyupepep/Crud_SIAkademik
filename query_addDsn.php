<?php
require "koneksi.php";
$npp  = $_POST["npp"];
$nama_dosen = $_POST["nama_dosen"];
$homebase = $_POST["homebase"];

$sql = "insert dosen values('$npp','$nama_dosen','$homebase')";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header("location:indexDsn.php");
