<?php
include "koneksi.php";

if(isset($_GET['id'])) :
    // query ke database
    $sql = "SELECT * FROM buku WHERE idbuku = '".$_GET['idbuku']."'";
    $hasil = mysqli_query($kon,$sql);
    // cek hasil query dari database
    if(mysqli_num_rows($hasil) <= 0){
        echo "Data tidak ditemukan!! <br>";
        echo "<a href='buku_tampil.php'>Daftar Buku</a>";
        exit;
    }
    // konversi hasil query ke assosiatif array
    $data = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
</head>

<body>
    <a href="buku_isi.php">ISI BUKU</a> | <a href="buku_cari.php">CARI BUKU</a> | <a href="buku_tampil.php">DAFTAR
        BUKU</a>
    <br><br>
    <h2>Informasi Buku</h2>
    <br>
    <table border="1">
        <tbody>
            <tr>
                <td colspan="2" align="center"><img src="thumb/<?=$data['foto'];?>" alt="<?=$data['judul'];?>"
                        width="80" height="100" loading="lazy"></td>
            </tr>
            <tr>
                <td>Kode Buku</td>
                <td><?=$data['kode'];?></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td><?=$data['judul'];?></td>
            </tr>
            <tr>
                <td>Pengarang Buku</td>
                <td><?=$data['pengarang'];?></td>
            </tr>
            <tr>
                <td>Penerbit Buku</td>
                <td><?=$data['penerbit'];?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
<?php else :
    echo "Data tidak ditemukan!!";
    echo "<a href='buku_tampil.php'>Daftar Buku</a>";
    endif;
?>
