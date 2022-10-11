<?php
    function jumlah($bil1,$bil2){
        $jumlah = $bil1 + $bil2;
        return $jumlah;
    }
    function kurang($bil1,$bil2){
        $kurang = $bil1 - $bil2;
        return $kurang;
    }
    function kali($bil1,$bil2){
        $kali = $bil1 * $bil2;
        return $kali;
    }
    function bagi($bil1,$bil2){
        $bagi = $bil1 / $bil2;
        return $bagi;
    }
    function sisa_bagi($bil1,$bil2){
        $sisa_bagi = $bil1 % $bil2;
        return $sisa_bagi;
    }
    if($_POST["hitung"] == "JUMLAH"){
        $hasil = jumlah($_POST["bil1"],$_POST["bil2"]);
        echo "Hasil jumlah : $hasil";
    }
    if($_POST["hitung"] == "KURANG"){
        $hasil = kurang($_POST["bil1"],$_POST["bil2"]);
        echo "Hasil kurang : $hasil";
    }
    if($_POST["hitung"] == "KALI"){
        $hasil = kali($_POST["bil1"],$_POST["bil2"]);
        echo "Hasil kali : $hasil";
    }
    if($_POST["hitung"] == "BAGI"){
        $hasil = bagi($_POST["bil1"],$_POST["bil2"]);
        echo "Hasil bagi : $hasil";
    }
    if($_POST["hitung"] == "SISA_BAGI"){
        $hasil = sisa_bagi($_POST["bil1"],$_POST["bil2"]);
        echo "Hasil sisa bagi : $hasil";
    }
?>
