<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Beli</title>
    <style>
        @media print {
            #tombol {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div id="tombol">
        <input type="button" value="Beli Lagi" onclick="window.location.assign('barang_tersedia.php')">
        <input type="button" value="Print" onclick="window.print()">
    </div>

    <?php
    $idhjual = htmlspecialchars($_GET['idhjual']);
    include "koneksi.php";
    $sqlhjual = "SELECT * FROM hjual WHERE idhjual = $idhjual";
    $hasilhjual = mysqli_query($kon, $sqlhjual);
    $rowhjual = mysqli_fetch_assoc($hasilhjual);
    ?>
    <pre>
        <h2>Bukti Pembelian</h2>
        No. Nota    :   <?= date('Ymd') . $rowhjual['idhjual'] ?><br>
        Tanggal     :   <?= $rowhjual['tanggal'] ?><br>
        Nama        :   <?= $rowhjual['namacust'] ?><br>
        <?php
        $sqldjual = "SELECT barang.nama,djual.harga,djual.qty,(djual.harga*djual.qty) as jumlah FROM djual INNER JOIN barang ON barang.idbarang = djual.idbarang WHERE djual.idhjual = $idhjual";
        $hasildjual = mysqli_query($kon, $sqldjual) or die('gagal menemukan detail jual');
        ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>NAMA BARANG</th>
                <th>QUANTITY</th>
                <th>HARGA</th>
                <th>JUMLAH</th>
            </tr>
            <?php $totalharga = 0;
            while ($rowdjual = mysqli_fetch_assoc($hasildjual)) :
            ?>
            <tr>
                <td><?= $rowdjual['nama'] ?></td>
                <td align="right"><?= number_format($rowdjual['qty'], 0, ',', '.') ?></td>
                <td align="right"><?= number_format($rowdjual['harga'], 0, ',', '.') ?></td>
                <td align="right"><?= number_format($rowdjual['jumlah'], 0, ',', '.') ?></td>
            </tr>
            <?php $totalharga += $rowdjual['jumlah'];
            endwhile;
            ?>
            <tr>
                <td colspan="3" align="right">
                    <strong>Total Jumlah</strong>
                </td>
                <td align="right">
                    <strong><?= number_format($totalharga, 0, ',', '.'); ?></strong>
                </td>
            </tr>
        </table>
    </pre>
</body>

</html>
