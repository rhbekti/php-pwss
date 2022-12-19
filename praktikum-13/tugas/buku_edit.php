<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";
if (isset($_GET['idbuku'])) {
    $sql = "SELECT * FROM buku WHERE idbuku = {$_GET['idbuku']}";
    $hasil = mysqli_query($kon, $sql);
    $data = mysqli_fetch_array($hasil);
} else {
    echo "Data tidak ditemukan..!!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <style>
        .kotak {
            width: 500px;
            border: 1px solid #333333;
            padding: 10px;
            margin: 30px auto;
        }
    </style>
</head>

<body>
    <div class="kotak">
        <h2>EDIT BUKU</h2>
        <hr>
        <form action="buku_simpan.php" method="post" enctype="multipart/form-data">
            <table>
                <input type="hidden" name="idbuku" value="<?= $data['idbuku'] ?>">
                <tr>
                    <td>Kode</td>
                    <td><input type="text" name="kode" value="<?= $data['kode'] ?>"></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul" value="<?= $data['judul'] ?>"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input type="text" name="pengarang" value="<?= $data['pengarang'] ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type=" text" name="penerbit" value="<?= $data['penerbit'] ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type=" text" name="stok" value="<?= $data['stok'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto Sampul</td>
                    <td><img src="thumb/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>">
                        <br>
                        <input type="file" name="foto">
                        <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">
                    </td>
                </tr>
            </table>
            <hr>
            <button type="submit" name="proses" value="edit">Perbarui</button>
            <button type="reset" name="reset">Reset</button>
        </form>
    </div>
</body>

</html>
