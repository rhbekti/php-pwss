<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}

$dpinjam = ['idhpinjam', 'idbuku', 'qty'];
$hpinjam = ['tanggal', 'nama', 'email', 'notelp'];

$data = [];
$buku_pilih = '';
$qty = 1;

foreach ($_POST as $key => $value) {
    if (in_array($key, $hpinjam)) {
        if (strlen(trim($value)) == 0) {
            echo $key . ' buku harus di isi<br>';
            echo "<button type='button' onclick='history.back()'>Kembali</button>";
            exit;
        } else {
            $data += [$key => htmlspecialchars($value)];
        }
    }
}

if (isset($_COOKIE['pinjaman'])) {
    $buku_pilih = $_COOKIE['pinjaman'];
} else {
    echo "Keranjang Buku masih kosong!";
    echo "<button type='button' onclick='history.back()'>Kembali</button>";
    exit;
}

include "koneksi.php";
$simpan = true;
$mulai_transaksi = mysqli_begin_transaction($kon);

$sql = "INSERT INTO hpinjam(" . implode(',', $hpinjam) . ") VALUES ('" . implode("', '", $data) . "')";
$hasil = mysqli_query($kon, $sql);

if (!$hasil) {
    echo "Data Peminjam gagal disimpan <br>";
    $simpan = false;
}

$idhpinjam = mysqli_insert_id($kon);
if ($idhpinjam == 0) {
    echo "Data Peminjam tidak ditemukan <br>";
    $simpan = false;
}

$buku_array = explode(",", $buku_pilih);
$jumlah = count($buku_array);


if ($jumlah <= 1) {
    echo "Tidak ada buku yang dipilih <br>";
    $simpan = false;
} else {
    foreach ($buku_array as $idbuku) {
        if ($idbuku == 0) {
            continue;
        }
        $sql = "SELECT * FROM buku WHERE idbuku = $idbuku";
        $hasil = mysqli_query($kon, $sql);

        if (!$hasil) {
            echo "Buku tidak ada <br>";
            $simpan = false;
        } else {
            $row = mysqli_fetch_assoc($hasil);
            $stok = $row['stok'] - $qty;
            if ($stok < 0) {
                echo "Stok Buku " . $row['judul'] . " Kosong <br>";
                $simpan = false;
                break;
            }
        }

        $data = [$idhpinjam, $idbuku, $qty];
        $sql = "INSERT INTO dpinjam(" . implode(',', $dpinjam) . ") VALUES ('" . implode("', '", $data) . "')";
        $hasil = mysqli_query($kon, $sql);

        if (!$hasil) {
            echo "Detail pinjam gagal disimpan <br>";
            $simpan = false;
            break;
        }

        $sql = "UPDATE buku SET stok = $stok WHERE idbuku = $idbuku";
        $hasil = mysqli_query($kon, $sql);

        if (!$hasil) {
            echo "Update Stok buku gagal <br>";
            $simpan = false;
            break;
        }
    }
}

if ($simpan) {
    $komit = mysqli_commit($kon);
} else {
    $rollback = mysqli_rollback($kon);
    echo "Peminjaman Gagal <br> <input type='button' value='Kembali' onclick='self.history.back()'>";
    exit;
}
header("Location:bukti_pinjam.php?idhpinjam=$idhpinjam");
setcookie('pinjaman', $buku_pilih, time() - 3600);
