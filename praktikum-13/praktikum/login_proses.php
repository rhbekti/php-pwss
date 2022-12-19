<?php
session_start();
$pengguna = htmlspecialchars($_POST['pengguna']);
$kata_kunci = htmlspecialchars(md5($_POST['kata_kunci']));

$dataValid = "YA";
if (strlen(trim($pengguna)) == 0) {
    echo "User harus diisi<br>";
    $dataValid = "TIDAK";
}
if (strlen(trim($kata_kunci)) == 0) {
    echo "Password harus diisi<br>";
    $dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
    echo "Masih ada kesalahan!! <br>";
    echo "<input type='button' value='Kembali' onclick='selft.history.back()' />";
    exit;
}

include "koneksi.php";
$sql = "SELECT * FROM pengguna WHERE user='" . $pengguna . "' AND password = '" . $kata_kunci . "' LIMIT 1";
$hasil = mysqli_query($kon, $sql) or die("Gagal akses!!");
$jumlah = mysqli_num_rows($hasil);

if ($jumlah > 0) {
    $row = mysqli_fetch_assoc($hasil);
    $_SESSION = [
        'user' => $row['user'],
        'nama_lengkap' => $row['nama_lengkap'],
        'akses' => $row['akses']
    ];
    header('Location:halaman_awal.php');
} else {
    echo "User atau Password Salah!! <br>";
    echo "<input type='button' value='Kembali' onclick='self.history.back()' />";
}
