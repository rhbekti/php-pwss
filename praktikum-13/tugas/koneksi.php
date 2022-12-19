<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "root";
$dbName = "sewabuku";

$kon = mysqli_connect($host, $user, $pass);

if (!$kon) {
    die("Koneksi Database Gagal " . mysqli_connect_error());
}

$hasil = mysqli_select_db($kon, $dbName);

if (!$hasil) {
    $hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
    if (!$hasil) {
        die("Gagal Buat Database");
    } else {
        $hasil = mysqli_select_db($kon, $dbName);
        if (!$hasil) {
            die("Gagal Konek Database");
        }
    }
}

$sqlTabelBuku = "CREATE TABLE IF NOT EXISTS buku (
    idbuku INT(11) NOT NULL AUTO_INCREMENT,
    kode VARCHAR(10),
    judul VARCHAR(40),
    pengarang VARCHAR(40),
    penerbit VARCHAR(40),
    stok INT(11),
    foto VARCHAR(40) DEFAULT '',
    PRIMARY KEY(idbuku),
    UNIQUE(judul)
    )";
mysqli_query($kon, $sqlTabelBuku) or die("Gagal Buat Koneksi Tabel Buku");

$sqlTabelHpinjam = "CREATE TABLE IF NOT EXISTS hpinjam(
    idhpinjam INT(11) NOT NULL AUTO_INCREMENT,
    tanggal DATE NOT NULL,
    nama VARCHAR(50) NOT NULL DEFAULT '',
    email VARCHAR(50) NOT NULL DEFAULT '',
    notelp VARCHAR(20) NOT NULL DEFAULT '',
    PRIMARY KEY(idhpinjam)
    )";

mysqli_query($kon, $sqlTabelHpinjam) or die("Gagal Buat Koneksi Tabel Hpinjam");

$sqlTabelDpinjam = "CREATE TABLE IF NOT EXISTS dpinjam(
    iddpinjam INT(11) NOT NULL AUTO_INCREMENT,
    idhpinjam INT(11) NOT NULL,
    idbuku INT(11) NOT NULL,
    qty INT(11) NOT NULL,
    PRIMARY KEY(iddpinjam)
    )";

mysqli_query($kon, $sqlTabelDpinjam) or die("Gagal Buat Koneksi Tabel Dpinjam");

$sqlTabelUser = "CREATE TABLE IF NOT EXISTS pengguna(
    idpengguna INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(50) NOT NULL,
    nama_lengkap VARCHAR(50) NOT NULL,
    akses VARCHAR(10) NOT NULL
)";

mysqli_query($kon, $sqlTabelUser) or die("Gagal buat tabel pengguna");

$sql = "SELECT * FROM pengguna";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);

if ($jumlah == 0) {
    $sql = "INSERT INTO pengguna(user,password,nama_lengkap,akses) VALUES ('admin',md5('admin'),'administrator','petugas'),('rhbekti',md5('rhbekti'),'mahasiswa','pengunjung')";

    mysqli_query($kon, $sql);
}
