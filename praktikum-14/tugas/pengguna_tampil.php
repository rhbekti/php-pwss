<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";
$sql = "SELECT * FROM pengguna";

$hasil = mysqli_query($kon, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pengguna</title>
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
    <h2>Daftar Pengguna</h2>
    <a href="pengguna_isi.php">Tambah Pengguna</a>
    <br><br>
    <?php include "logout.php"; ?>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Nama Lengkap</th>
                <th>Akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($hasil) > 0) :
                foreach ($hasil as $dt) : ?>

                    <tr>
                        <td><?= $dt['user']; ?></td>
                        <td><?= $dt['nama_lengkap']; ?></td>
                        <td><?= $dt['akses']; ?></td>
                        <td> <a href="pengguna_detail.php?idpengguna=<?= $dt['idpengguna']; ?>">Lihat</a> | <a href="pengguna_edit.php?idpengguna=<?= $dt['idpengguna'] ?>&edit=<?= sha1($dt['idpengguna']) ?>">Edit</a> | <a href="pengguna_hapus.php?idpengguna=<?= $dt['idpengguna'] ?>">Hapus</a></td>
                    </tr>

            <?php
                endforeach;
            endif; ?>
        </tbody>
    </table>

</body>

</html>
