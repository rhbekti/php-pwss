<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "root";
$dbName = "toko_barang";

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

$sqlTabelBarang = "CREATE TABLE IF NOT EXISTS barang (
                    idbarang INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                    nama VARCHAR(40) NOT NULL,
                    harga INT NOT NULL DEFAULT 0,
                    stok INT NOT NULL DEFAULT 0,
                    foto VARCHAR(70) NOT NULL DEFAULT '',
                    KEY(nama))";

mysqli_query($kon,$sqlTabelBarang) or die("Gagal Buat Koneksi Tabel Barang");

$sqlTabelHjual = "CREATE TABLE IF NOT EXISTS hjual (
                idhjual INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                tanggal DATE NOT NULL,
                namacust VARCHAR(50) NOT NULL DEFAULT '',
                email VARCHAR(50) NOT NULL DEFAULT '',
                notelp VARCHAR(20) NOT NULL DEFAULT '')";

mysqli_query($kon,$sqlTabelHjual) or die("Gagal Buat Koneksi Tabel Hjual");

$sqlTabelDjual = "CREATE TABLE IF NOT EXISTS djual (
                iddjual INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                idhjual INT NOT NULL,
                idbarang INT NOT NULL,
                qty INT NOT NULL,
                harga INT NOT NULL)";

mysqli_query($kon,$sqlTabelDjual) or die("Gagal Buat Koneksi Tabel Djual");

// echo "Tabel Siap <hr>";
