<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Pinjam</title>
</head>

<body>
    <h2>DATA PEMINJAMAN BUKU</h2>

    <form action="simpan_keranjang.php" method="post">
        <table>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" id="tanggal"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td>:</td>
                <td><input type="number" name="notelp" id="notelp"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
    include_once("buku_keranjang.php");
?>
