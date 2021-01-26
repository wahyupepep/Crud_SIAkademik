<?php
include "koneksi.php"; 
$keyword = $_GET["keyword"];

if ($keyword == '') {
    $dosens = null;
}else{  
    $query = "SELECT * FROM dosen
                WHERE
              npp LIKE '%$keyword%' OR
              nama_dosen LIKE '%$keyword%' OR
              homebase LIKE '%$keyword%' 
            ";
    $dosens = mysqli_query($koneksi, $query);
}
?>

<table class="table table-hover text-center mt-3">
    <tr class="thead-dark">
        <th>No</th>
        <th>NPP</th>
        <th>Nama Dosen</th>
        <th>Home Base</th>
        <th>Opsi</th>
    </tr>
    <?php

    if ($dosens != null) {
        $no = 1;
        while ($row = mysqli_fetch_array($dosens)) :
        ?>
    
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row["npp"] ?></td>
                <td><?php echo $row["nama_dosen"] ?></td>
                <td><?php echo $row["homebase"] ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="editDsn.php?kode=<?php echo $row['npp'] ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="deleteDsn.php?kode=<?php echo $row["npp"] ?>" onclick="return confirm('Data Anda Akan Dihapus.Apakah Anda Yakin?')">Hapus</a>
                </td>
            </tr>
    
        <?php endwhile; ?>
    <?php } ?>
    
</table>