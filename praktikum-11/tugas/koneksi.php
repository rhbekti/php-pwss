<?php

$host = "localhost";
$user = "root";
$pass = "root";
$dbName = "sewabuku";

$kon = mysqli_connect($host,$user,$pass);

if(!$kon){
    die("Koneksi Database Gagal ".mysqli_connect_error());
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
    stok INT(11),
    foto VARCHAR(40) DEFAULT '')";
mysqli_query($kon,$sqlTabelBuku) or die("Gagal Buat Koneksi Tabel Buku");
