<?php
@session_start();
$pengguna = isset($_SESSION['user']) ? $_SESSION['user'] : '';
$nama_lengkap = isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : '';
$akses = isset($_SESSION['akses']) ? $_SESSION['akses'] : 'pengunjung';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APLIKASI PERPUSTAKAAN</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="wrap">
        <div id="header">
            <h1>PERPUSTAKAAN PWSS</h1>
        </div>
        <div style="clear: both"></div>
        <div id="tengah">
            <!-- info pengguna -->
            <div id="info_pengguna">
                <?php
                if (!empty($pengguna)) {
                    echo "Sedang Login Sebagai : $pengguna, Nama Lengkap : $nama_lengkap <br> Akses Sebagai : $akses, ";
                    $tampil_login = "display:none";
                    $tampil_logout = "";
                } else {
                    $tampil_login = "";
                    $tampil_logout = "display:none";
                }
                ?>
                Tanggal : <?= date("d F Y"); ?>
            </div>
            <!-- end info pengguna -->
            <!-- menu -->
            <div id="menu">
                <div id="menu_header">Menu</div>
                <div id="menu_konten">
                    <ul>
                        <?php
                        $tampil = "";
                        if ($akses == "pengunjung") {
                            $tampil = "display:none";
                        }
                        ?>
                        <li><a style="<?= $tampil; ?>" href="buku_tampil.php">Kelola Buku</a></li>
                        <li><a style="<?= $tampil; ?>" href="pengguna_isi.php">Input Pengguna</a></li>
                        <li><a style="<?= $tampil; ?>" href="buku_tersedia.php">Buku Tersedia</a></li>
                        <li><a style="<?= $tampil; ?>" href="buku_keranjang.php">Keranjang Peminjaman</a></li>
                        <li><a style="<?= $tampil; ?>" href="buku_pinjam.php">Transaksi Peminjaman</a></li>
                        <li><a style="<?= $tampil_login; ?>" href="login_form.php">Login</a></li>
                        <li><?php include "logout.php"; ?></li>
                    </ul>
                </div>
                <!-- end menu -->
            </div>
            <!-- konten -->
            <div id="konten">
