<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";
$idbuku = htmlspecialchars($_GET['idbuku']);
$sql = "SELECT * FROM buku WHERE idbuku = '$idbuku'";
$hasil = mysqli_query($kon, $sql);

if (!$hasil) die("Gagal query ..");

$data = mysqli_fetch_array($hasil);
$kode = $data['kode'];
$judul = $data['judul'];
$pengarang = $data['pengarang'];
$penerbit = $data['penerbit'];
$stok = $data['stok'];
$foto = $data['foto'];
?>

<h2>Konfirmasi Hapus</h2>
<table border="1">
    <tbody>
        <tr>
            <td colspan="2" align="center"><img src="thumb/<?= $data['foto']; ?>" alt="<?= $data['judul']; ?>" width="80" height="100" loading="lazy"></td>
        </tr>
        <tr>
            <td>Kode Buku</td>
            <td><?= $data['kode']; ?></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><?= $data['judul']; ?></td>
        </tr>
        <tr>
            <td>Pengarang Buku</td>
            <td><?= $data['pengarang']; ?></td>
        </tr>
        <tr>
            <td>Penerbit Buku</td>
            <td><?= $data['penerbit']; ?></td>
        </tr>
    </tbody>
</table>
<br><br>
Apakah data ini akan dihapus? <br>
<a href="buku_hapus.php?idbuku=<?= $idbuku; ?>&hapus=1">Ya</a>
&nbsp;&nbsp;
<a href="buku_tampil.php">Tidak</a> <br><br>

<?php
if (isset($_GET['hapus'])) {
    $sql = "DELETE FROM buku WHERE idbuku='$idbuku'";
    $hasil = mysqli_query($kon, $sql);
    if (!$hasil) {
        echo "Gagal hapus barang: {$nama} <br>";
        echo "<a href='buku_tampil.php'>Kembali ke Daftar Barang</a>";
    } else {
        $gbr = "pict/{$foto}";
        if (file_exists($gbr)) unlink($gbr);

        $gbr = "thumb/{$foto}";
        if (file_exists($gbr)) unlink($gbr);
        echo "<script>window.location.href='buku_tampil.php';</script>";
    }
}
?>
