<?php
$nama = $_POST["nama"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];

$dataValid = "YA";

if(strlen(trim($nama))== 0){
    echo "Nama Barang Harus Diisi! <br>";
    $dataValid = "TIDAK";
}
if(strlen(trim($harga))== 0){
    echo "Harga Barang Harus Diisi! <br>";
    $dataValid = "TIDAK";
}
if(strlen(trim($stok))== 0){
    echo "Stok Barang Harus Diisi! <br>";
    $dataValid = "TIDAK";
}
if($dataValid == "TIDAK"){
    echo "Masih Ada Kesalahan, silahkan perbaiki! <br>";
    echo "<button type='button' onClick='self.history.back()'>Kembali</button>";
    exit;
}

include "koneksi.php";
$sql = "INSERT INTO barang(nama,harga,stok) VALUES('$nama','$harga','$stok')";
$hasil = mysqli_query($kon,$sql);
if(!$hasil){
    echo "Gagal Simpan, silakan ulangi! <br> ";
    echo mysqli_error($kon);
    echo "<br> <button type='button' onClick='self.history.back()'>Kembali</button>";
    exit;
}else{
    echo "Simpan data Berhasil!";
}
