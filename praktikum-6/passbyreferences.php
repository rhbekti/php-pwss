<?php
    function nilai_pertama($x){
        $x += 20;
    }
    function nilai_kedua($x){
        $x += 200;
    }
    $nilai_awal = 100;
    nilai_pertama($nilai_awal);
    echo "Nilai Akhir, Function Pertama : $nilai_awal <br>";
    nilai_kedua($nilai_awal);
    echo "Nilai Akhir, Function Kedua : $nilai_awal <br>";
?>
