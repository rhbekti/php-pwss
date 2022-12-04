<?php
    include "koneksi.php";

    if(isset($_POST['judul']) && isset($_POST['pengarang'])){
        $sql = "SELECT * FROM buku WHERE judul LIKE '%".$_POST['judul']."%' and pengarang LIKE '%".$_POST['pengarang']."%' ORDER BY idbuku DESC";
    }else{
        $sql = "SELECT * FROM buku";
    }
    $hasil = mysqli_query($kon,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Buku</title>
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
    <h2>Daftar Buku</h2>
    <a href="buku_isi.php">ISI BUKU</a> | <a href="buku_cari.php">CARI BUKU</a>
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
                <td> <a href="buku_detail.php?id=<?=$dt['idbuku'];?>">Lihat Buku</a></td>
            </tr>

            <?php
            endforeach;
            endif; ?>
        </tbody>
    </table>

</body>

</html>
