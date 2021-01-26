<?php
require_once __DIR__ . '/vendor/autoload.php';
require "koneksi.php";

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$mpdf->WriteHTML('
	<!DOCTYPE html>
	<html>
	<head>
	    <title>SIAkademik:Cetak Daftar Mahasiswa</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="stylepdf.css">
	</head>
	<body>
	<img class="logo" src="foto/udinus.jpg" alt="udinus.jpg">
	<div class="head">
		<h1>Daftar Mahasiswa<br>
		<sub>Sistem Informasi - Fakultas Ilmu Komputer - Universitas Dian Nuswantoro<sub><br>
        <small>Tahun Akademik 2020-2021</small></h1>
        <hr />
	</div>
	<table style="text-align:center">	
	<tr>
		<th>No.</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Foto</th>
	</tr>
	');
$sql = "select * from mhs";
$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$no = 0;
while ($row = mysqli_fetch_assoc($qry)) {
	$no++;
	$mpdf->WriteHTML('
	<tr>
		<td>' . $no . '</td>
		<td>' . $row["nim"] . '</td>
		<td>' . $row["nama"] . '</td>
		<td>' . $row["email"] . '</td>	
		<td><img style="height:80px; width:80px;" src="foto/' . $row["foto"] . '"></td>	
	</tr>
	');
}
$mpdf->WriteHTML('</table>');
$mpdf->WriteHTML('</body></html>');
// Output a PDF file directly to the browser
$mpdf->Output();
