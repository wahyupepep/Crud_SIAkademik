<?php
include "koneksi.php";
$keyword = $_GET["keyword"];

if ($keyword == '') {
    $makuls = null;
}else{  
    $query = "SELECT * FROM makul
                WHERE
              id_matkul LIKE '%$keyword%' OR
              nama_matkul LIKE '%$keyword%' OR
              sks LIKE '%$keyword%' OR 
              jenis LIKE '%$keyword%' OR
              semester LIKE '%$keyword%' 
            ";
    $makuls = mysqli_query($koneksi, $query);
}
?> 

<table class="table table-hover text-center mt-3">
    <tr class="thead-dark">
        <th>No</th>
        <th>Kode Matkul</th>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Jenis</th>
        <th>Semester</th>
        <th>Opsi</th>
    </tr>
    <?php

    if ($makuls != null) {
        $no = 1;
        while ($row = mysqli_fetch_array($makuls)) :
        ?>
    
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row["id_matkul"] ?></td>
                <td><?php echo $row["nama_matkul"] ?></td>
                <td><?php echo $row["sks"] ?></td>
                <td><?php echo $row["jenis"] ?></td>
                <td><?php echo $row["semester"] ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="editMkl.php?id_matkul=<?php echo $row['id_matkul'] ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="deleteMkl.php?id_matkul=<?php echo $row["id_matkul"] ?>" onclick="return confirm('Data Anda Akan Dihapus.Apakah Anda Yakin?')">Hapus</a>
                </td>
            </tr>
    
        <?php endwhile; ?>
    <?php } ?>
    
</table>