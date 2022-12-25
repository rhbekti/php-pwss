<?php
@session_start();
$pengguna = isset($_SESSION['user']) ? $_SESSION['user'] : '';
$nama_lengkap = isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : '';
$akses = isset($_SESSION['akses']) ? $_SESSION['akses'] : 'beli';

if ($akses == 'toko') {
    $nama_akses = 'Operator Toko';
} else {
    $nama_akses = 'Pembeli';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APLIKASI TOKO ONLINE</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="wrap">
        <div id="header">
            <h1>TOKO ONLINE RHBEKTI</h1>
        </div>
        <div style="clear: both"></div>
        <div id="tengah">
            <!-- info pengguna -->
            <div id="info_pengguna">
                <?php
                if (!empty($pengguna)) {
                    echo "Sedang Login Sebagai : $pengguna, Nama Lengkap : $nama_lengkap <br> Akses Sebagai : $nama_akses, ";
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
                        if ($akses == "beli") {
                            $tampil = "display:none";
                        }
                        ?>
                        <li><a style="<?= $tampil; ?>" href="barang_tampil.php">Kelola Barang</a></li>
                        <li><a style="<?= $tampil; ?>" href="pengguna_isi.php">Input Pengguna</a></li>
                        <li><a style="<?= $tampil; ?>" href="barang_tersedia.php">Barang Tersedia</a></li>
                        <li><a style="<?= $tampil; ?>" href="barang_keranjang.php">Keranjang Belanja</a></li>
                        <li><a style="<?= $tampil; ?>" href="beli.php">Transaksi Pembelian</a></li>
                        <li><a style="<?= $tampil_login; ?>" href="login_form.php">Login</a></li>
                        <li><a style="<?= $tampil_logout; ?>" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <!-- end menu -->
            </div>
            <!-- konten -->
            <div id="konten">
