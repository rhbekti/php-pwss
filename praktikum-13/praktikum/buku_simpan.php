<?php
include 'koneksi.php';
if (isset($_POST['proses'])) {
    $data = [
        'kode' => htmlspecialchars($_POST['kode']),
        'judul' => htmlspecialchars($_POST['judul']),
        'pengarang' => htmlspecialchars($_POST['pengarang']),
        'penerbit' => htmlspecialchars($_POST['penerbit']),
        'stok' => htmlspecialchars($_POST['stok'])
    ];
    foreach ($data as $key => $val) {
        if (strlen(trim($val)) == 0) {
            echo $key . " harus diisi";
            echo "<br> <button type='button' onClick='self.history.back()'>Kembali</button>";
            exit;
        }
    }
    $sqlInsert = "INSERT INTO buku(kode,judul,pengarang,penerbit,stok) VALUES ('" . implode("', '", $data) . "')";
    $hasil = mysqli_query($kon, $sqlInsert);
    if (!$hasil) {
        echo "Gagal Simpan, silakan ulangi! <br> ";
        echo mysqli_error($kon);
        echo "<br> <button type='button' onClick='self.history.back()'>Kembali</button>";
        exit;
    } else {
        echo "Simpan data Berhasil!";
        echo "<br> <a href='buku_isi.php'>Kembali</a>";
    }
}
