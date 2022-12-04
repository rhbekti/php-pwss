<?php

$nama = htmlspecialchars($_POST['nama']);
$harga = htmlspecialchars($_POST['harga']);
$stok = htmlspecialchars($_POST['stok']);

$foto = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$size = $_FILES['foto']['size'];
$type = $_FILES['foto']['type'];

$maxsize = 1500000;
$typeYgBoleh = ["image/jpeg", "image/png", "image/jpg"];

$dirFoto = "pict";

if (!is_dir($dirFoto)) {
    mkdir($dirFoto);
}

$fileTujuanFoto = $dirFoto . "/" . $foto;


$dirThumb = "thumb";
if (!is_dir($dirThumb)) {
    mkdir($dirThumb);
}
$fileTujuanThumb = $dirThumb."/".$foto;


$dataValid = "YA";

if ($size > 0) {
    if ($size > $maxsize) {
        echo "Ukuran File Terlalu Besar </br>";
        $dataValid = "TIDAK";
    }
    if (!in_array($type, $typeYgBoleh)) {
        echo "Type File Tidak Dikenal </br>";
        $dataValid = "TIDAK";
    }
}

if (strlen(trim($nama)) == 0) {
    echo "Nama Barang Harus Diisi </br>";
    $dataValid = "TIDAK";
}
if (strlen(trim($harga)) == 0) {
    echo "Harga Barang Harus Diisi </br>";
    $dataValid = "TIDAK";
}
if (strlen(trim($stok)) == 0) {
    echo "Stok Barang Harus Diisi </br>";
    $dataValid = "TIDAK";
}
if($dataValid == "TIDAK"){
    echo "Masih ada kesalahan,silakan perbaiki! <br>";
    echo "<input type='button' value='kembali' onClick='self.history.back()'>";
    exit;
}

include "koneksi.php";

$sql = "INSERT INTO barang(nama,harga,stok,foto) VALUES ('$nama','$harga','$stok','$foto')";

$hasil = mysqli_query($kon,$sql);

if(!$hasil){
    echo "Gagal simpan,silakan ulangi! <br>";
    echo mysqli_error($kon);
    echo "<br><input type='button' value='kembali' onClick='self.history.back()'>";
    exit;
}else{
    echo "Simpan Data berhasil";
}

if($size > 0){
    if(!move_uploaded_file($tmpName,$fileTujuanFoto)){
        echo "Gagal Upload Gambar...<br>";
        echo "<a href='barang_tampil.php'>Daftar Barang</a>";
        exit;
    }else{
        buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
    }
}

echo "<br>File sudah diupload <hr> ";
echo "<a href='barang_tampil.php'>Daftar Barang</a>";

function buat_thumbnail($file_src,$file_dst){
    list($w_src,$h_src,$type) = getimagesize($file_src);

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
    if($w_src > $h_src){
        $w_dst = $thumb;
        $h_dst = round($thumb/$w_src*$h_src);
    }else{
        $w_dst = round($thumb/$h_src*$w_src);
        $h_dst = $thumb;
    }

    $img_dst = imagecreatetruecolor($w_dst,$h_dst);

    imagecopyresampled($img_dst,$img_src,0,0,0,0,$w_dst,$h_dst,$w_src,$h_src);
    imagejpeg($img_dst,$file_dst);
    imagedestroy($img_src);
    imagedestroy($img_dst);
}
