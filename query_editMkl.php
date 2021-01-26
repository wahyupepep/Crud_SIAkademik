<?php
  require "koneksi.php";

  $id_matkul  = $_POST["id_matkul"];
  $nama_matkul = $_POST["nama_matkul"];
  $sks = $_POST["sks"];
  $jenis = $_POST["jenis"];
  $semester = $_POST["semester"];
  $uploadOk = 1;

  $sql="update makul set nama_matkul='$nama_matkul', sks='$sks', jenis='$jenis', semester='$semester' where id_matkul='$id_matkul'";
  mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
  header("location:indexMkl.php");
