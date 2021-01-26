<?php
require_once __DIR__ . '/vendor/autoload.php';
require "koneksi.php";

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$mpdf->WriteHTML('
	<!DOCTYPE html>
	<html>
	<head>
	    <title>SIAkademik:Cetak Daftar Mata Kuliah</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="stylepdf.css">
	</head>
	<body>
	<img class="logo" src="foto/udinus.jpg" alt="udinus.jpg">
	<div class="header">
		<h1>Daftar Mata Kuliah<br>
		<sub>Sistem Informasi - Fakultas Ilmu Komputer - Universitas Dian Nuswantoro<sub><br>
		<small>Tahun Akademik 2020-2021</small></h1>
        <hr />
	</div>
	<table style="text-align:center">	
	<tr>
		<th>No.</th>
		<th>Kode Matkul</th>
		<th>Nama Matkul</th>
		<th>SKS</th>
		<th>Jenis</th>
		<th>Semester</th>
    </tr>
	');
$sql = "select * from makul";
$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$no = 0;
while ($row = mysqli_fetch_assoc($qry)) {
	$no++;
	$mpdf->WriteHTML('
	<tr>
		<td>' . $no . '</td>
		<td>' . $row["id_matkul"] . '</td>
		<td>' . $row["nama_matkul"] . '</td>
		<td>' . $row["sks"] . '</td>	
		<td>' . $row["jenis"] . '</td>	
		<td>' . $row["semester"] . '</td>	
	</tr>
	');
}
$mpdf->WriteHTML('</table>');
$mpdf->WriteHTML('</body></html>');
// Output a PDF file directly to the browser
$mpdf->Output();
