<h1>TRANSAKSI</h1>
<hr>
<form action="hitung.php" method="post">
<?php
$count = 0;
$no = 1;

while ($count <= 2) {
    echo "<pre>Nomor         : $no <br>";
    echo "Nama Barang   : <input name='nama_barang_$count' type='text'> <br>";
    echo "Jumlah        : <input name='jumlah_barang_$count' type='number'> <br>";
    echo "Harga Barang  : <input name='harga_barang_$count' type='number'> <br> <pre> <hr>";
    $count++;
    $no++;
}
?>
<div style="display: flex;">
    <button type="submit" name="hitung" style="margin-right: 10px;">Hitung</button>
    <button type="reset">BATAL</button>
</div>
</form>
