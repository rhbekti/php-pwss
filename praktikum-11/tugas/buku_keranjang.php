<?php
    include "koneksi.php";

    $buku_pilih = 0;

    if(isset($_COOKIE['pinjaman'])){
        $buku_pilih = $_COOKIE['pinjaman'];
    }

    if(isset($_GET['idbuku'])){
        $idbuku = $_GET['idbuku'];
        $buku_pilih = str_replace((",".$idbuku),"",$buku_pilih);
        setcookie('pinjaman',$buku_pilih,time() + 3600);
    }

    $sql = "SELECT * FROM buku WHERE idbuku IN (".$buku_pilih.") ORDER BY idbuku DESC";

    $hasil = mysqli_query($kon,$sql) or die("Gagal Query");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tersedia</title>
    <style>
        table,
        th,
        tr,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2>Keranjang Buku</h2>
    <a href="buku_tersedia.php">BUKU
        TERSEDIA</a> | <a href="buku_pinjam.php">SIMPAN KERANJANG</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($hasil) > 0) :
            foreach($hasil as $dt): ?>

            <tr>
                <td><a href="pict/<?=$dt['foto'];?>"><img src="thumb/<?=$dt['foto'];?>" alt="<?=$dt['judul'];?>"
                            width="80" height="100"></a></td>
                <td><?=$dt['judul'];?></td>
                <td><?=$dt['pengarang'];?></td>
                <td> <a href="<?=$_SERVER['PHP_SELF'].'?idbuku='.$dt['idbuku']?>">Batal</a> </td>
            </tr>

            <?php
            endforeach;
            endif; ?>
        </tbody>
    </table>

</body>

</html>
