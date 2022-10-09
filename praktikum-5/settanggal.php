<?php
    $angka_hari = $_POST["angka_hari"];
    $bulan = $_POST["bulan"];
    $tahun = $_POST["tahun"];
    $angka_tanggal = mktime(0,0,0,$bulan,$angka_hari,$tahun);
    $tanggal = date("l, j F Y",$angka_tanggal);
    echo "FORMAT TANGGAL : $tanggal";
?>
