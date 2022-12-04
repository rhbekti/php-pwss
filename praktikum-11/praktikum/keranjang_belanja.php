<?php
$barang_pilih = 0;

if(isset($_COOKIE['keranjang'])){
    $barang_pilih = $_COOKIE['keranjang'];
}

if(isset($_GET['idbarang'])){
    $idbarang = $_GET['idbarang'];
    $barang_pilih = str_replace((",".$idbarang),"",$barang_pilih);
    setcookie('keranjang',$barang_pilih,time()+3600);
}

include "koneksi.php";

$sql = "SELECT * FROM barang WHERE idbarang IN (".$barang_pilih.") ORDER BY idbarang DESC";
$hasil = mysqli_query($kon,$sql);

if(!$hasil){
    die("Gagal query...".mysqli_error($kon));
}
?>
<h2>keranjang belanja</h2>
<a href="barang_tersedia.php">Belanja</a> | <a href="beli.php">Beli</a>
<br>
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
            <a href="<?=$_SERVER['PHP_SELF'].'?idbarang='.$row['idbarang'];?>">BATAL</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
