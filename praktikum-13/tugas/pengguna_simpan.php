<?php
include 'koneksi.php';
if ($_POST['aksi'] == "SIMPAN") {
    // simpan ke database
    // rule data
    $kolom = ['nama_lengkap', 'user', 'password', 'akses'];

    $data = proses_form($kolom);
    $data['password'] = md5($data['password']);
    $query = "INSERT INTO pengguna(" . implode(",", $kolom) . ") VALUES  ('" . implode("', '", $data) . "')";
    $hasil = mysqli_query($kon, $query);

    if (!$hasil) {
        echo "Gagal menyimpan data";
        exit;
    } else {
        header("Location:pengguna_tampil.php");
    }
} elseif ($_POST['aksi'] == "EDIT") {
    $kolom = ['idpengguna', 'nama_lengkap', 'user', 'password', 'akses'];
    $data = proses_form($kolom);

    if (strlen(trim($_POST['new_password'])) != 0) {
        $data['password'] = md5(htmlspecialchars($_POST['new_password']));
    }
    $query = "UPDATE pengguna SET user='$data[user]',password='$data[password]',nama_lengkap='$data[nama_lengkap]',akses='$data[akses]' WHERE idpengguna='$data[idpengguna]'";
    $hasil = mysqli_query($kon, $query);

    if (!$hasil) {
        echo "Gagal memperbarui data" . mysqli_error($kon);
        exit;
    } else {
        header("Location:pengguna_tampil.php");
    }
} else {
    echo "Aksi not found";
    exit;
}

// menangani form input
function proses_form($kolom, $error = 0)
{
    $data = [];
    // memproses post
    foreach ($_POST as $ky => $vl) {
        if (in_array($ky, $kolom)) {
            if (strlen(trim($vl)) == 0) {
                echo "$ky buku harus diisi! </br>";
                $error = 1;
            } else {
                $data += [$ky => htmlspecialchars($vl)];
            }
        }
    }
    // validasi error
    if ($error > 0) {
        echo "Masih ada kesalahan,silakan perbaiki! <br>";
        echo "<button type='button' onClick='self.history.back()'>Kembali</button>";
        exit;
    }
    return $data;
}
