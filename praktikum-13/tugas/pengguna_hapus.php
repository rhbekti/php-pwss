<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";
$idpengguna = htmlspecialchars($_GET['idpengguna']);
$sql = "SELECT * FROM pengguna WHERE idpengguna = '$idpengguna'";
$hasil = mysqli_query($kon, $sql);

if (!$hasil) die("Gagal query ..");

$data = mysqli_fetch_array($hasil);
$idpengguna = $data['idpengguna'];
$user = $data['user'];
$nama_lengkap = $data['nama_lengkap'];
?>

<h2>Konfirmasi Hapus</h2>
<table border="0">
    <tbody>
        <tr>
            <td>User</td>
            <td>:</td>
            <td><?= $data['user']; ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= $data['nama_lengkap']; ?></td>
        </tr>
    </tbody>
</table>
<br><br>
Apakah data ini akan dihapus? <br>
<a href="pengguna_hapus.php?idpengguna=<?= $idpengguna; ?>&hapus=1">Ya</a>
&nbsp;&nbsp;
<a href="pengguna_tampil.php">Tidak</a> <br><br>

<?php
if (isset($_GET['hapus'])) {
    $sql = "DELETE FROM pengguna WHERE idpengguna='$idpengguna'";
    $hasil = mysqli_query($kon, $sql);
    if (!$hasil) {
        echo "Gagal hapus pengguna: {$nama_lengkap} <br>";
        echo "<a href='buku_tampil.php'>Kembali ke Daftar Barang</a>";
    } else {
        echo "<script>window.location.href='pengguna_tampil.php';</script>";
    }
}
?>
