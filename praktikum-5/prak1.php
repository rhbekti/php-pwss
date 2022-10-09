<?php
    $angkaAcak = rand(1,9999999);
    echo "Angka Acak : $angkaAcak <br>";

    $akar = sqrt(100);
    echo "Akar angka 100 : $angka <br>";

    $decimal = 123.6783;
    echo "Nilai Decimal : $decimal <br>";

    $pembulatan = floor($decimal);
    echo "Pembulatan nilai decimal ke bulat : $pembulatan <br>";

    $pembulatannaik = ceil($decimal);
    echo "Pembulatan nilai naik : $pembulatannaik <br>";

    $pendekatan = round($decimal,3);
    echo "Pendekatan nilai : $pendekatan <br>";
