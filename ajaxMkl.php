<?php
  require "koneksi.php";

  $jmlDataPerHal = 3;
  $sql="select * from makul";		
  $qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
  
  $jmlData = mysqli_num_rows($qry);
  $jmlHal = ceil($jmlData / $jmlDataPerHal);
    if (isset($_GET['hal'])){
	  $halAktif=$_GET['hal'];
    } else {
	  $halAktif=1;
    }

  $awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;
  $sql="select * from makul limit $awalData,$jmlDataPerHal";
  $hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi))		
?>
