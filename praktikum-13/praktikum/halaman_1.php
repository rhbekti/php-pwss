<div style="background: red;">
    <?php
    session_start();
    echo "Selamat Datang <br>";
    echo "USER : " . $_SESSION['user'] . "<br>";
    echo "NAMA : " . $_SESSION['nama_lengkap'] . "<br>";
    echo "AKSES : " . $_SESSION['akses'] . "<br>";
    ?>
    <hr>
    <br>
    <h1>Halaman 1</h1>
</div>
