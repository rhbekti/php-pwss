<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbName = "sewabuku";

$kon = mysqli_connect($host,$user,$pass);
if(!$kon){
    die("Gagal Koneksi...");
}

$hasil = mysqli_select_db($kon,$dbName);
if(!$hasil){
    $hasil = mysqli_query($kon,"CREATE DATABASE $dbName");
    if(!$hasil){
        die("Gagal Buat Database");
    }else{
        $hasil = mysqli_select_db($kon,$dbName);
        if(!$hasil){
            die("Gagal Konek Database");
        }
    }
}

$sqlTabelBuku = "CREATE TABLE IF NOT EXISTS buku (
    idbuku INT(11) PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(10),
    judul VARCHAR(40),
    pengarang VARCHAR(40),
    penerbit VARCHAR(40),
    stok INT(11))";
mysqli_query($kon,$sqlTabelBuku) or die("Gagal Buat Koneksi Tabel Buku");

// untuk database toko_ol
// $sqlTabelBarang = "CREATE TABLE IF NOT EXISTS barang (
//                     idbarang INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
//                     nama VARCHAR(40) NOT NULL,
//                     harga INT NOT NULL DEFAULT 0,
//                     stok INT NOT NULL DEFAULT 0,
//                     foto VARCHAR(70) NOT NULL DEFAULT '',
//                     KEY(nama))";
// mysqli_query($kon,$sqlTabelBarang) or die("Gagal Buat Koneksi Tabel Barang");
