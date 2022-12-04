<?php

$kolom = ['tanggal','nama','email','notelp'];

$data = [];
$barang_pilih = '';

foreach($_POST as $key => $value){
    if(in_array($key,$kolom)){
        if(strlen(trim($value))==0){
            echo $key.' buku harus di isi<br>';
            echo "<button type='button' onclick='history.back()'>Kembali</button>";
            exit;
        }else{
            $data += [$key => htmlspecialchars($value)];
        }
    }
}

if(isset($_COOKIE['pinjaman'])){
    $barang_pilih = $_COOKIE['pinjaman'];
}else{
    echo "Keranjang Buku masih kosong!";
    echo "<button type='button' onclick='history.back()'>Kembali</button>";
    exit;
}

echo "Buku siap disimpan";
setcookie('pinjaman',$barang_pilih,time()-3600);
