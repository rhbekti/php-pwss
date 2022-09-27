<?php
    $pemilik["AD 92343 ZA"] = "Umar";
    $pemilik["AB 89332 NA"] = "Bakri";
    $pemilik["B 347622 BU"] = "Tika";
    $pemilik["D 88780 AS"] = "Tutik";
    $pemilik["L 87332 KL"] = "Budi";

    // praktikum 3
    $index = "D 88780 AS";
    echo "Pemilik kendaraan No.Pol ".$index." adalah ".$pemilik[$index];

    // praktikum 4
    echo "<h2> Daftar Pemilik Kendaraan</h2>";

    foreach ($pemilik as $nomor => $nama) {
        echo "Nomor Polisi : $nomor <br>";
        echo "Nama Pemilik : $nama <br>";
    }
