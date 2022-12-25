<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";
if (isset($_GET['idpengguna'])) {
    $sql = "SELECT * FROM pengguna WHERE idpengguna = {$_GET['idpengguna']}";
    $hasil = mysqli_query($kon, $sql);
    $row = mysqli_fetch_array($hasil);
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
    <title>Input Buku</title>
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
        <h2>EDIT PENGGUNA</h2>
        <hr>
        <form action="pengguna_simpan.php" method="post">
            <table>
                <input type="hidden" name="idpengguna" value="<?= $row['idpengguna']; ?>">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>"></td>
                </tr>
                <tr>
                    <td>User</td>
                    <td><input type="text" name="user" value="<?= $row['user'] ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <input type="hidden" name="password" value="<?= $row['password'] ?>">
                    <td><input type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td>Akses</td>
                    <td><select name="akses">
                            <option value="petugas" <?= ($row['akses'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                            <option value="pengunjung" <?= ($row['akses'] == 'pengunjung') ? 'selected' : ''; ?>>Pengunjung</option>
                        </select>
                    </td>
                </tr>
            </table>
            <hr>
            <button type="submit" name="aksi" value="EDIT">Simpan</button>
            <button type="reset" name="reset">Reset</button>
        </form>
    </div>
</body>

</html>
