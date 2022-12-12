<?php
include "koneksi.php";

$idbarang = htmlspecialchars($_GET['idbarang']);

$sql = "SELECT * FROM barang WHERE idbarang = '$idbarang'";
$hasil = mysqli_query($kon,$sql);

if(!$hasil) die ("Gagal query ..");

$data = mysqli_fetch_array($hasil);
$nama = $data["nama"];
$harga = $data["harga"];
$stok = $data["stok"];
$foto = $data["foto"];
?>

<h2>.:: EDIT BARANG ::.</h2>
<form action="barang_simpan.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idbarang" value="<?=$idbarang;?>">
    <table border="1">
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" value="<?=$nama;?>"></td>
        </tr>
        <tr>
            <td>Harga Barang</td>
            <td><input type="text" name="harga" value="<?=$harga;?>"></td>
        </tr>
        <tr>
            <td>Stok Barang</td>
            <td><input type="text" name="stok" value="<?=$stok;?>"></td>
        </tr>
        <tr>
            <td>Gambar [max=1.5MB]</td>
            <td>
                <input type="file" name="foto">
                <input type="hidden" name="foto_lama" value="<?=$foto;?>"> <br>
                <img src="thumb/t_<?=$foto;?>" alt="<?=$nama;?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Simpan" name="proses">
                <input type="reset" value="Reset" name="reset">
            </td>
        </tr>
    </table>
</form>
