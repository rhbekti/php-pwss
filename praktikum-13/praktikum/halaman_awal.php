<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "Sesi telah habis <br> <a href='login_form.php'>Login Lagi</a>";
    exit;
}

echo "Selamat Datang <br>";
echo "User : " . $_SESSION['user'] . "</br>";
echo "Nama : " . $_SESSION['nama_lengkap'] . "</br>";
?>
<hr>
<div id="menu">
    <h2>Link</h2>
    <a href="halaman_1.php">Halaman 1</a> <br>
    <a href="halaman_2.php">Halaman 2</a> <br>
    <a href="logout.php">Logout</a> <br>
</div>
