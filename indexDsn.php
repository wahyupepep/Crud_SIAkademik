<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: forbidden.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>SIAkademik:Halaman Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
			xhttp.open("GET", "ajaxDsn.php?hal=" + hal, true);
			xhttp.send();
		}
	</script>
</head>

<body>

	<?php
	require "koneksi.php";
	require "head.html";

	$jmlDataPerHal = 8;
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$sql = "select * from dosen where npp like'%$cari%' or nama_dosen like '%$cari%' or homebase like '%$cari%'";
	} else {
		$sql = "select * from dosen";
	}

	$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	$jmlData = mysqli_num_rows($qry);
	$jmlHal = ceil($jmlData / $jmlDataPerHal);
	if (isset($_GET['hal'])) {
		$halAktif = $_GET['hal'];
	} else {
		$halAktif = 1;
	}
	$awalData = ($jmlDataPerHal * $halAktif) - $jmlDataPerHal;
	$kosong = false;
	if (!$jmlData) {
		$kosong = true;
	}

	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$sql = "select * from dosen where npp like'%$cari%' or nama_dosen like '%$cari%' or homebase like '%$cari%' 
	  limit $awalData,$jmlDataPerHal";
	} else {
		$sql = "select * from dosen limit $awalData,$jmlDataPerHal";
	}

	$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	?>

	<div class="utama">
		<h2 class="text-center mt-4 text-uppercase font-weight-bold">Data Dosen</h2>
		<div class="text-center mb-4"><a href="cetakDsn.php" target="_blank"><span class="fas fa-print text-info">&nbsp;Print</span></a></div>
		<div class="ml-2 mr-2">
			<span class="float-left">
				<a class="btn btn-info" href="addDsn.php">Tambah Data</a>
			</span>
			<span class="float-right">
				<form action="" method="post" class="form-inline">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white" id="basic-addon1">
								<i class="fas fa-search"></i>
							</span>
						</div>
						<input class="form-control border-left-0 " type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword" >
					</div>
				</form>
			</span>

			<br><br>
			<div id="tabel_dosen">
				<table class="table table-hover text-center mt-3">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>NPP</th>
							<th>Nama Dosen</th>
							<th>Home Base</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($kosong) {
						?>

							<tr>
								<th colspan="6">
									<div class="alert alert-info alert-dismissible fade show text-center"> Data tidak ada</div>
								</th>
							</tr>

							<?php
						} else {
							$no = $awalData + 1;
							while ($row = mysqli_fetch_assoc($hasil)) {
							?>

								<tr>
									<td><?php echo $no ?></td>
									<td><?php echo $row["npp"] ?></td>
									<td><?php echo $row["nama_dosen"] ?></td>
									<td><?php echo $row["homebase"] ?></td>
									<td>
										<a class="btn btn-warning btn-sm" href="editDsn.php?kode=<?php echo $row["npp"] ?>">Edit</a>
										<a class="btn btn-danger btn-sm" href="deleteDsn.php?kode=<?php echo $row["npp"] ?>" onclick="return confirm('Data Anda Akan Dihapus.Apakah Anda Yakin?')">Hapus</a>
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

			<ul class="pagination mt-3">
				<?php
				if ($halAktif > 1) {
					$back = $halAktif - 1;
					echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
				}

				for ($i = 1; $i <= $jmlHal; $i++) {
					if ($i == $halAktif) {
						echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:green;'>$i</a></li>";
					} else {
						echo "<li class='page-item'><a class='page-link' href=?hal=$i style='color:black;'>$i</a></li>";
					}
				}

				if ($halAktif < $jmlHal) {
					$forward = $halAktif + 1;
					echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
				}
				?>
			</ul>
		</div>
	</div>


	<script src="searchDsn.js"></script>
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
			xhttp.open("GET", "indexDsn.php?hal=" + hal, true);
			xhttp.send();
		}
	</script>
</body>

</html>