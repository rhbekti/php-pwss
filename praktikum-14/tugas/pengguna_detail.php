<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";

if (isset($_GET['idpengguna'])) :
    // query ke database
    $sql = "SELECT * FROM pengguna WHERE idpengguna = '" . $_GET['idpengguna'] . "'";
    $hasil = mysqli_query($kon, $sql);
    // cek hasil query dari database
    if (mysqli_num_rows($hasil) <= 0) {
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
        <h2>Informasi Pengguna</h2>
        <br>
        <table border="1">
            <tbody>
                <tr>
                    <td>User</td>
                    <td><?= $data['user']; ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?= $data['nama_lengkap']; ?></td>
                </tr>
            </tbody>
        </table>
    </body>

    </html>
<?php else :
    echo "Data tidak ditemukan!!";
    echo "<a href='pengguna_tampil.php'>Daftar Pengguna</a>";
endif;
?>
