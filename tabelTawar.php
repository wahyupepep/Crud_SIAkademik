<?php
include "koneksi.php";
$keyword = $_GET["keyword"];

if ($keyword == '') {
    $tawars = null;
} else {
    $query ="SELECT * from makul as m, dosen as d, kultawar as k
			where k.id_matkul=m.id_matkul and
				  k.npp = d.npp 
				  having
				  nama_matkul like'%$keyword%' or
				  nama_dosen like '%$keyword%' 
				  order by m.nama_matkul asc, d.nama_dosen asc";
    $tawars = mysqli_query($koneksi, $query);
}
?>

<table class="table table-hover text-center mt-3">
    <tr class="thead-dark">
        <th>No.</th>
        <th>Mata Kuliah</th>
        <th>Dosen</th>
        <th>Kelompok</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Ruang</th>
        <th>Opsi</th>
    </tr>
    <?php

    if ($tawars != null) {
        $no = 1;
        while ($row = mysqli_fetch_array($tawars)) :
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

        <?php endwhile; ?>
    <?php } ?>

</table>