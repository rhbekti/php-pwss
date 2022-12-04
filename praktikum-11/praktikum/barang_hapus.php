<?php
include "koneksi.php";
$idbarang = htmlspecialchars($_GET['idbarang']);
$sql = "SELECT * FROM barang WHERE idbarang = '$idbarang'";
$hasil = mysqli_query($kon,$sql);

if(!$hasil) die ("Gagal query ..");

$data = mysqli_fetch_array($hasil);
$nama = $data['nama'];
$stok = $data['stok'];
$harga = $data['harga'];
$foto = $data['foto'];
?>

<h2>Konfirmasi Hapus</h2>
Nama Barang : <?=$nama;?> <br>
Harga Barang : <?=$harga;?> <br>
Stok : <?=$stok;?> <br>
Foto : <img src="thumb/t_<?=$foto;?>" alt="<?=$foto;?>">
<br><br>
Apakah data ini akan dihapus? <br>
<a href="barang_hapus.php?idbarang=<?=$idbarang;?>&hapus=1">Ya</a>
&nbsp;&nbsp;
<a href="barang_tampil.php">Tidak</a> <br><br>

<?php
if(isset($_GET['hapus'])){
    $sql = "DELETE FROM barang WHERE idbarang='$idbarang'";
    $hasil = mysqli_query($kon,$sql);
    if(!$hasil){
        echo "Gagal hapus barang: {$nama} <br>";
        echo "<a href='barang_tampil.php'>Kembali ke Daftar Barang</a>";
    }else{
        $gbr = "pict/{$foto}";
        if(file_exists($gbr)) unlink($gbr);

        $gbr = "thumb/t_{$foto}";
        if(file_exists($gbr)) unlink($gbr);
        echo "<script>window.location.href='barang_tampil.php';</script>";
    }
}
?>
