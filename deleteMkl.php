<?php
  require "koneksi.php";
  
  $id_matkul = $_GET["id_matkul"];
  $sql = "delete from makul where id_matkul = '$id_matkul'";
  mysqli_query($koneksi,$sql);
  header("location:indexMkl.php");
?>
