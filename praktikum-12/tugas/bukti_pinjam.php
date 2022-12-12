<style>
    @media print {
        #tombol {
            display: none;
        }
    }
</style>
<div id="tombol">
    <input type="button" value="Pinjam Lagi" onclick="window.location.assign('buku_tersedia.php')">
    <input type="button" value="Print" onclick="window.print()">
</div>
<?php
$idhpinjam = $_GET['idhpinjam'];
include "koneksi.php";
$sql = "SELECT * FROM hpinjam WHERE idhpinjam=$idhpinjam";
$hasil = mysqli_query($kon, $sql) or die("Query Gagal");
$row = mysqli_fetch_assoc($hasil);
?>
<pre>
    <h2>Bukti Peminjaman</h2>
NO      : <?= date('Ymd') . $row['idhpinjam'] ?> <br>
TANGGAL : <?= date('d-m-Y', strtotime($row['tanggal'])) ?> <br>
Nama    : <?= $row['nama']; ?> <br>
    <?php
    $sql = "SELECT judul,pengarang,dpinjam.qty as jumlah FROM buku,dpinjam WHERE dpinjam.idhpinjam = $idhpinjam and dpinjam.idbuku = buku.idbuku";
    $row = mysqli_query($kon, $sql);
    $total = 0;
    ?>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Judul</th>
            <th>Pengarang</th>
        </tr>
        <?php foreach ($row as $col) : ?>
            <tr>
                <td><?= $col['judul']; ?></td>
                <td><?= $col['pengarang']; ?></td>
            </tr>
        <?php
            $total += $col['jumlah'];
        endforeach; ?>
        <tr>
            <td>Total</td>
            <td><?= $total; ?></td>
        </tr>
    </table>
</pre>
