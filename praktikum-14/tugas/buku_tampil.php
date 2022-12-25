<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include "koneksi.php";
include 'template_atas.php';

if (isset($_POST['judul']) && isset($_POST['pengarang'])) {
    $sql = "SELECT * FROM buku WHERE judul LIKE '%" . $_POST['judul'] . "%' and pengarang LIKE '%" . $_POST['pengarang'] . "%' ORDER BY idbuku DESC";
} else {
    $sql = "SELECT * FROM buku";
}
$hasil = mysqli_query($kon, $sql);
?>
<h2>Daftar Buku</h2>
<a href="buku_isi.php">ISI BUKU</a> <a href="buku_cari.php">CARI BUKU</a> <a href="buku_tersedia.php">BUKU
    TERSEDIA</a>
<br><br>
<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($hasil) > 0) :
            foreach ($hasil as $dt) : ?>

                <tr>
                    <td><a href="pict/<?= $dt['foto']; ?>"><img src="thumb/<?= $dt['foto']; ?>" alt="<?= $dt['judul']; ?>" width="80" height="100"></a></td>
                    <td><?= $dt['judul']; ?></td>
                    <td><?= $dt['pengarang']; ?></td>
                    <td> <a href="buku_detail.php?idbuku=<?= $dt['idbuku']; ?>">Lihat Buku</a> <a href="buku_edit.php?idbuku=<?= $dt['idbuku'] ?>&edit=<?= sha1($dt['idbuku']) ?>">Edit Buku</a> <a href="buku_hapus.php?idbuku=<?= $dt['idbuku'] ?>">Hapus Buku</a></td>
                </tr>

        <?php
            endforeach;
        endif; ?>
    </tbody>
</table>
<?php
include 'template_bawah.php';
?>
