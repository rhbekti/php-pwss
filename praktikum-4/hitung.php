<h1>HITUNG TRANSAKSI</h1>
<hr>
<?php
    $no = 1;
    $total_barang = 0;
    $total_seluruh = 0;

    for($i = 0;$i <= 2;$i++){
        echo "<pre>Nomor         : $no <br>";
        echo "Nama Barang   : ".$_POST['nama_barang_'.$i]."<br>";
        echo "Jumlah        : ".$_POST['jumlah_barang_'.$i]." <br>";
        echo "Harga Barang  : ".$_POST['harga_barang_'.$i]." <br>";
        $total_barang = $_POST['jumlah_barang_'.$i] * $_POST['harga_barang_'.$i];
        echo "Total         : ".$total_barang." <br> <pre> <hr>";
        $total_seluruh += $total_barang;
        $no++;
    }

    echo "Jumlah Total : $total_seluruh <hr>";
?>
