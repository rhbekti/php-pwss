<?php
// simpan ke database
include 'koneksi.php';
// rule data
$kolom = ['kode', 'judul', 'pengarang', 'penerbit', 'stok', 'foto'];
$query = "";

// cek apakah edit atau tambah data baru
if (isset($_POST['idbuku'])) {
    $aksi = "EDIT";

    $data = proses_form($kolom);

    // cek apakah ada gambar yg diupload
    if ($_FILES['foto']['error'] > 0) {
        $data['foto'] = htmlspecialchars($_POST['foto_lama']);
    } else {
        $data = proses_upload($data);

        // hapus foto lama
        $foto_lama = $_POST['foto_lama'];

        $gbr = "pict/{$foto_lama}";
        if(file_exists($gbr)) unlink($gbr);

        $gbr = "thumb/{$foto_lama}";
        if(file_exists($gbr)) unlink($gbr);
    }

    $query = "UPDATE buku SET
                    kode='" . $data['kode'] . "',
                    judul='" . $data['judul'] . "',
                    pengarang='" . $data['pengarang'] . "',
                    penerbit='" . $data['penerbit'] . "',
                    stok='" . $data['stok'] . "',
                    foto='" . $data['foto'] . "'
                    WHERE idbuku = '" . $_POST['idbuku'] . "'";
    $message = "Diperbarui";
} else {
    $aksi = "TAMBAH";

    $data = proses_form($kolom);

    $data = proses_upload($data);

    $query = "INSERT INTO buku(" . implode(",", $kolom) . ") VALUES  ('" . implode("', '", $data) . "')";
    $message = "Disimpan";
}

// eksekusi query
$hasil = mysqli_query($kon, $query);

if (!$hasil) {
    echo "Data Gagal " . $message;
    echo mysqli_error($kon) . "<br>";
    echo "<button type='button' onClick='self.history.back()'>Kembali</button>";
    exit;
}

echo "Data Buku Berhasil " . $message."<br>";
echo "<a href='buku_isi.php'>Isi Buku</a> | <a href='buku_tampil.php'>Daftar Buku</a>";

// menangani file upload
function proses_upload($data, $error = 0)
{
    // rule foto
    $maxsize = 1500000;
    $typeYgBoleh = ['image/jpeg', 'image/png', 'image/jpg'];
    $dirFoto = cek_dir('pict');
    $dirThumb = cek_dir('thumb');

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
    }
    return $data;
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

// membuat direktori folder
function cek_dir($namadir)
{
    if (!is_dir($namadir)) {
        mkdir($namadir);
    }
    return $namadir;
}

// membuat thumbnail dari foto
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
