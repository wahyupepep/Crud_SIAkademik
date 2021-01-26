<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Daftar Penawaran Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>
	<?php

	//memanggil file berisi fungsi2 yang sering dipakai
	require "koneksi.php";
	require "head.html";

	/*	cetak data	*/
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$sql = "select * from makul as m, dosen as d, kultawar as k
			where k.id_matkul=m.id_matkul and
				  k.npp = d.npp
				  having
				  nama_matkul like'%$cari%' or
				  nama_dosen like '%$cari%'
				  order by m.nama_matkul asc, d.nama_dosen asc";
	} else {
		$sql = "select * from makul as m, dosen as d, kultawar as k
			where k.id_matkul=m.id_matkul and
				  k.npp = d.npp
				  order by m.nama_matkul asc, d.nama_dosen asc";
	}
	$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	$kosong = false;
	if (!mysqli_num_rows($hasil)) {
		$kosong = true;
	}
	?>
	<div class="utama">
		<h2 class="text-center mt-4 text-uppercase font-weight-bold">Daftar Penawaran KRS</h2>
		<div class="text-center mb-4"><a href="#" target="_blank"><span class="fas fa-print text-white">&nbsp;Print</span></a></div>
		<div class="mr-2 ml-2">
			<span class="float-left">
				<a class="btn btn-info" href="addTawar.php">Tambah Data</a>
			</span>
			<span class="float-right">
				<form action="" method="post" class="form-inline">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white" id="basic-addon1">
								<i class="fas fa-search"></i>
							</span>
						</div>
						<input class="form-control border-left-0 " type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
					</div>
				</form>
			</span>

			<br><br>
			<!-- Cetak data dengan tampilan tabel -->
			<div id="tabel_tawar">
				<table class="table table-hover texr-center mt-3">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Mata Kuliah</th>
							<th>Dosen</th>
							<th>Kelompok</th>
							<th>Hari</th>
							<th>Jam</th>
							<th>Ruang</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//jika data tidak ada
						if ($kosong) {
						?>
							<tr>
								<th colspan="6">
									<div class="alert alert-info alert-dismissible fade show text-center">
										<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
										Data tidak ada
									</div>
								</th>
							</tr>
							<?php
						} else {
							$no = 1;
							while ($row = mysqli_fetch_assoc($hasil)) {
							?>
								<tr>
									<td><?php echo $no ?></td>
									<td><?php echo $row["nama_matkul"] ?></td>
									<td><?php echo $row["nama_dosen"] ?></td>
									<td><?php echo $row["klp"] ?></td>
									<td><?php echo $row["hari"] ?></td>
									<td><?php echo $row["jamkul"] ?></td>
									<td><?php echo $row["ruang"] ?></td>
									<td>
										<a class="btn btn-warning btn-sm" href="editKulTawar.php?kode=<?php echo $row['idkultawar'] ?>">Edit</a>
										<a class="btn btn-danger btn-sm" href="deleteTawar.php?kode=<?php echo $row["idkultawar"] ?>" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
									</td>
								</tr>
						<?php
								$no++;
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="searchTawar.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script>
		function cetak(hal) {
			var xhttp;
			var dtcetak;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					dtcetak = this.responseText;
				}
			};
			xhttp.open("GET", "indexTawar.php?hal=" + hal, true);
			xhttp.send();
		}
	</script>
</body>

</html>