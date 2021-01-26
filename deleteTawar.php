<?php
//memanggil file pustaka fungsi
require "koneksi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_GET["kode"];

//membuat query hapus data
$sql="delete from kultawar where idkultawar='$id'";
mysqli_query($koneksi,$sql);
header("location:indexTawar.php");
?>