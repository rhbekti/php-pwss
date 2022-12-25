<?php
if (!session_id()) session_start();
include('template_atas.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = [];

    foreach ($_POST as $key => $value) {
        if (strlen(trim($value)) == 0) {
            echo $key . " harus di isi";
            exit;
        } else {
            $data += [$key => $value];
        }
    }

    $data['kata_kunci'] = md5($data['kata_kunci']);

    include "koneksi.php";
    $sql = "SELECT * FROM pengguna WHERE user = '" . $data['pengguna'] . "' and password = '" . $data['kata_kunci'] . "' LIMIT 1";
    $hasil = mysqli_query($kon, $sql) or die("Gagal query ke pengguna");
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION = [
            'user' => $row['user'],
            'nama_lengkap' => $row['nama_lengkap'],
            'akses' => $row['akses']
        ];
        header('Location:buku_tersedia.php');
    } else {
        echo "User atau Password Salah";
    }
} else {
    echo "Not Allowed";
}
include('template_bawah.php');
