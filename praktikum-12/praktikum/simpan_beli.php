<?php

$namacust = $_POST['namacust'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
$tanggal = date('Y-m-d');
$barang_pilih = '';
$qty = 1;

$dataValid = "YA";

if (strlen(trim($namacust)) == 0) {
    echo "Nama harus diisi...";
    $dataValid = "TIDAK";
}
if (strlen(trim($email)) == 0) {
    echo "Email harus diisi...";
    $dataValid = "TIDAK";
}
if (strlen(trim($notelp)) == 0) {
    echo "No.Telp harus diisi...";
    $dataValid = "TIDAK";
}
if (isset($_COOKIE['keranjang'])) {
    $barang_pilih = $_COOKIE['keranjang'];
} else {
    echo "Keranjang Belanja Kosong <br>";
    $dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
    echo "Masih ada kesalahan, silakan perbaiki! <br>";
    echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
    exit;
}

include "koneksi.php";
$simpan = true;
$mulai_transaksi = mysqli_begin_transaction($kon);

$sql = "INSERT INTO hjual (tanggal,namacust,email,notelp) VALUES ('$tanggal','$namacust','$email','$notelp')";
$hasil = mysqli_query($kon, $sql);

if (!$hasil) {
    echo "Data Customer tidak ada <br>";
    $simpan = false;
}

$idhjual = mysqli_insert_id($kon);
if ($idhjual == 0) {
    echo "Data Customer tidak ada <br>";
    $simpan = false;
}

$barang_array = explode(",", $barang_pilih);
$jumlah = count($barang_array);

if ($jumlah <= 1) {
    echo "Tidak ada barang yang dipilih <br>";
    $simpan = false;
} else {
    foreach ($barang_array as $idbarang) {
        if ($idbarang == 0) {
            continue;
        }
        $sql = "SELECT * FROM barang WHERE idbarang = $idbarang";
        $hasil = mysqli_query($kon, $sql);
        if (!$hasil) {
            echo "Barang tidak ada <br>";
            $simpan = false;
        } else {
            $row = mysqli_fetch_assoc($hasil);
            $stok = $row['stok'] - $qty;
            if ($stok < 0) {
                echo "Stok barang " . $row['nama'] . " kosong <br>";
                $simpan = false;
                break;
            }
            $harga = $row['harga'];
        }

        $sql = "INSERT INTO djual (idhjual,idbarang,qty,harga) VALUES ('$idhjual','$idbarang','$qty','$harga')";
        $hasil = mysqli_query($kon, $sql);

        if (!$hasil) {
            echo "Detail jual gagal disimpan <br>";
            $simpan = false;
            break;
        }

        $sql = "UPDATE barang SET stok = $stok WHERE idbarang = $idbarang";
        $hasil = mysqli_query($kon, $sql);

        if (!$hasil) {
            echo "Update stok barang gagal <br>";
            $simpan = false;
            break;
        }
    }
}

if ($simpan) {
    $komit = mysqli_commit($kon);
} else {
    $rollback = mysqli_rollback($kon);
    echo "Pembelian gagal <br>";
    echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
    exit;
}

header("Location:bukti_beli.php?idhjual=$idhjual");
setcookie('keranjang', $barang_pilih, time() - 3600);
