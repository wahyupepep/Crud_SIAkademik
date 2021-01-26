<?php
include "koneksi.php";
$keyword = $_GET["keyword"];

if ($keyword == '') {
    $mahasiswas = null;
} else {
    $query = "SELECT * FROM mhs
                WHERE
              nim LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%'  
            ";
    $mahasiswas = mysqli_query($koneksi, $query);
}
?>

<table class="table table-hover text-center mt-3">
    <tr class="thead-dark">
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Opsi</th>
    </tr>
    <?php

    if ($mahasiswas != null) {
        $no = 1;
        while ($row = mysqli_fetch_array($mahasiswas)) :
    ?>

            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row["nim"] ?></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><img src="<?php echo "foto/" . $row["foto"] ?>" height="50"></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="editMkl.php?kode=<?php echo $row['id'] ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="deleteMkl.php?kode=<?php echo $row["id"] ?>" onclick="return confirm('Data Anda Akan Dihapus.Apakah Anda Yakin?')">Hapus</a>
                </td>
            </tr>

        <?php endwhile; ?>
    <?php } ?>

</table>