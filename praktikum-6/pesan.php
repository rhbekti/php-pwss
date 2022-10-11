<?php
    function judul(){
        echo "<h2>Praktikum Pemrograman Web!</h2>";
    }
    function garis(){
        echo "<br> ==================================== <br>";
    }
    function mhs($nim,$nama,$semester){
        echo "NIM : $nim <br>";
        echo "Nama : $nama <br>";
        echo "Semester : $semester <br>";
    }
    judul();
    garis();
    mhs("09872222","Umar Bakri",3);
    garis();
    mhs("215610064","Rahman Pambekti",3);
    garis();
    mhs("215610053","Dzikri Fandi S",3);
    garis();
    mhs("215610054","Hanif Ichsan Maulana",3);
    garis();
    mhs("215610055","Intan Putri P.",3);
    garis();
    mhs("215610056","Kibar Abd M.",3);
    garis();
?>
