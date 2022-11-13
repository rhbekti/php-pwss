<?php
// rule data
$kolom = ['kode', 'judul', 'pengarang', 'penerbit', 'stok', 'foto'];
$data = [];
$error = 0;

// rule foto
$maxsize = 1500000;
$typeYgBoleh = ['image/jpeg', 'image/png', 'image/jpg'];
$dirFoto = cek_dir('pict');
$dirThumb = cek_dir('thumb');

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

// memproses file
foreach ($_FILES as $ky => $vl) {
    if ($vl['error'] == 0) {
        $data += ['foto' => $vl['name']];
        if ($vl['size'] > $maxsize) {
            echo "Ukuran file melebihi batas!! <br>";
            $error = 1;
        }
        if (!in_array($vl['type'], $typeYgBoleh)) {
            echo "Tipe file tidak dikenal!! <br>";
            $error = 1;
        }
        if (!move_uploaded_file($vl['tmp_name'], $dirFoto . "/" . $vl['name'])) {
            echo "Gagal upload gambar..<br>";
            $error = 1;
        } else {
            buat_thumbnail($dirFoto . "/" . $vl['name'], $dirThumb . "/" . $vl['name']);
            echo "File berhasil diupload<br>";
        }
    }
}

// validasi error
if ($error > 0) {
    echo "Masih ada kesalahan,silakan perbaiki! <br>";
    echo "<button type='button' onClick='self.history.back()'>Kembali</button>";
    exit;
}

// simpan ke database
include 'koneksi.php';
$query = "INSERT INTO buku(" . implode(",", $kolom) . ") VALUES  ('" . implode("', '", $data) . "')";
$hasil = mysqli_query($kon, $query);

if (!$hasil) {
    echo "Gagal menyimpan data,silakan ulangi! <br>";
    echo mysqli_error($kon)."<br>";
    echo "<button type='button' onClick='self.history.back()'>Kembali</button>";
    exit;
}

echo "Simpan Data Berhasil<br>";
echo "<a href='barang_isi.php'>Isi Barang</a> | <a href='barang_tampil.php'>Daftar Barang</a>";


function cek_dir($namadir)
{
    if (!is_dir($namadir)) {
        mkdir($namadir);
    }
    return $namadir;
}

function buat_thumbnail($file_src, $file_dst)
{
    list($w_src, $h_src, $type) = getimagesize($file_src);

    switch ($type) {
        case 1:
            $img_src = imagecreatefromgif($file_src);
            break;
        case 2:
            $img_src = imagecreatefromjpeg($file_src);
            break;
        case 3:
            $img_src = imagecreatefrompng($file_src);
            break;
    }

    $thumb = 100;
    if ($w_src > $h_src) {
        $w_dst = $thumb;
        $h_dst = round($thumb / $w_src * $h_src);
    } else {
        $w_dst = round($thumb / $h_src * $w_src);
        $h_dst = $thumb;
    }

    $img_dst = imagecreatetruecolor($w_dst, $h_dst);

    imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $w_dst, $h_dst, $w_src, $h_src);
    imagejpeg($img_dst, $file_dst);
    imagedestroy($img_src);
    imagedestroy($img_dst);
}
