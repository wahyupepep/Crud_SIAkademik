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
    <title>SIAkademik:Edit Data Mata Kuliah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
    require "koneksi.php";
    require "head.html";

    $id_matkul = $_GET['id_matkul'];
    $sql = "select * from makul where id_matkul='$id_matkul'";
    $qry = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($qry);
    ?>

    <div class="utama">
        <h2 class="mb-4 mt-5 text-center">Edit Data Mata Kuliah</h2>
            <div class="ml-5 mr-5">
                <form method="post" action="query_editMkl.php">
                    <div class="form-group">
                        <label for="id_matkul">Kode Matkul</label>
                        <input class="form-control" type="text" name="id_matkul" id="id_matkul" value="<?php echo $row['id_matkul'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_matkul">Nama Matkul </label>
                        <input class="form-control" type="text" name="nama_matkul" id="nama_matkul" value="<?php echo $row['nama_matkul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="sks">sks </label>
                        <input class="form-control" type="text" name="sks" id="sks" value="<?php echo $row['sks'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Mata Kuliah</label>
                        <select name="jenis" class="form-control" name="jenis" id="jenis">
                            <option>Pilih Jenis Mata Kuliah</option>
                            <option value="T " <?php if ($row['jenis'] == 'T') { ?> selected <?php } ?>>T</option>
                            <option value="P " <?php if ($row['jenis'] == 'P') { ?> selected <?php } ?>>P</option>
                            <option value="T/P " <?php if ($row['jenis'] == 'T/P') { ?> selected <?php } ?>>T/P</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">semester </label>
                        <input class="form-control" type="text" name="semester" id="semester" value="<?php echo $row['semester'] ?>">
                    </div>
                    <div>
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
                    </div>
                    <input type="hidden" name="id_matkul" value="<?php echo $id_matkul ?>">
                </form>
        </div>
    </div>
</body>

</html>