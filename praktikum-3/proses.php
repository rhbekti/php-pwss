File Proses <hr>
<?php
    $jurusan = $_POST['jurusan'];

    switch ($jurusan) {
        case "TI":
            echo "Jurusan Anda Teknik Informatika </br>";
            // break;
        case "SI":
            echo "Jurusan Anda Sistem Informasi </br>";
            // break;
        case "MI":
            echo "Jurusan Anda Manajemen Informatika </br>";
            // break;
        case "TK":
            echo "Jurusan Anda Teknik Komputer </br>";
            // break;
        case "KA":
            echo "Jurusan Anda Komputerisasi Akuntansi </br>";
            // break;
        default:
            echo "Jurusan tidak ada";
    }

    $nilai = $_POST['angka'];
    echo "Nilai Anda = ".$nilai."</br>";

    if($nilai > 100){
        echo "Nilai kelebihan";
    }elseif($nilai > 70){
        echo "Selamat Anda Lulus Ujian";
    }elseif($nilai >= 40){
        echo "Anda harus ujian lagi";
    }else{
        echo "Maaf ,Gagal";
    }

?>
