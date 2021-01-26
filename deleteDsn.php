<?php
  require "koneksi.php";
  
  $npp = $_GET["kode"];
  $sql = "DELETE FROM dosen WHERE npp='$npp'";
  mysqli_query($koneksi,$sql);
  header("location:indexDsn.php");
?>
