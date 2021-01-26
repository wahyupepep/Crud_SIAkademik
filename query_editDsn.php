<?php
  require "koneksi.php";

  $npp     = $_POST["npp"];
  $nama_dosen     = $_POST["nama_dosen"];
  $homebase = $_POST["homebase"];
  $uploadOk = 1;

  $sql="update dosen set nama_dosen='$nama_dosen', homebase='$homebase' where npp='$npp'";
  mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
  header("location:indexDsn.php");
