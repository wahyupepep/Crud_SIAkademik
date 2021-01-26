<?php
require "koneksi.php";
$id_matkul  = $_POST["id_matkul"];
$nama_matkul = $_POST["nama_matkul"];
$sks = $_POST["sks"];
$jenis = $_POST["jenis"];
$semester = $_POST["semester"];

$sql = "insert makul values('$id_matkul','$nama_matkul','$sks','$jenis','$semester')";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header("location:indexMkl.php");