<?php
/*
    membuat tanggal
*/
$tgl = date_create("2022-7-10");
echo date_format($tgl,"d/M/Y");
/*
    menambahkan hari dari nilai string
*/
$tgl_sekarang = date_create(date("Y-m-d"));
date_add($tgl_sekarang,date_interval_create_from_date_string("10 days"));
echo "<br>".date_format($tgl_sekarang,"d-m-Y");
/*
    menambahkan nilai ke dalam array
*/
$a = [
    "Jeruk",
    "Mangga"
];
array_push($a,"Apel","Kelengkeng");
echo "<br>";
print_r($a);
/*
menghapus nilai elemen terakhir dari data array
*/
array_pop($a);
echo "<br>";
print_r($a);
/*
menghapus nilai elemen pertama dari data array
*/
array_shift($a);
echo "<br>";
print_r($a);
