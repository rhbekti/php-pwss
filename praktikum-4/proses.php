<?php
    $arr_jurusan = array(
        "TI" => "Teknik Informatika",
        "SI" => "Sistem Informasi",
        "MI" => "Manajemen Informatika",
        "KA" => "Komputer Akuntansi",
        "TK" => "Teknik Komputer"
    );
    $nama = $_POST['nama'];
    $kd = $_POST['jurusan'];
?>
<h2>Jurusan Anda</h2>
<pre>
    Nama            : <?=$nama;?> <br>
    Kode Jurusan    : <?=$kd;?> <br>
    Jurusan         : <?=$arr_jurusan[$kd];?>
</pre>
