<?php
include "koneksi.php";

if(isset($_POST['nama_barang'])){
    $sql = "SELECT * FROM barang WHERE nama LIKE '%".$_POST['nama_barang']."%' ORDER BY idbarang DESC";
}else{
    $sql = "SELECT * FROM barang";
}

$hasil = mysqli_query($kon,$sql);
if(!$hasil){
    die("Gagal query...".mysqli_error($kon));
}
?>
<a href="barang_isi.php">INPUT BARANG</a>
&nbsp;&nbsp;
<a href="barang_cari.php">CARI BARANG</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama Barang</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Operasi</th>
    </tr>
    <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($hasil)) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td> <a href="pict/<?=$row['foto'];?>"><img src="thumb/t_<?= $row['foto']; ?>" alt="<?= $row['nama']; ?>"
                    loading="lazy"></a></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['harga']; ?></td>
        <td><?= $row['stok']; ?></td>
        <td>
            <a href="barang_edit.php?idbarang=<?=$row['idbarang']?>">Edit</a>
            &nbsp;&nbsp;
            <a href="barang_hapus.php?idbarang=<?=$row['idbarang']?>">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
