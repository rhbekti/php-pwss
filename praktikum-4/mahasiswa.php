<h2>Menampilkan Daftar Nama Mahasiswa</h2>
<ol>
    <?php
        $array_mahasiswa = $_POST['mahasiswa'];

        for ($a=1; $a <= 9; $a++) {
            echo "<li>".$array_mahasiswa[$a]."</li>";
        }
    ?>
</ol>
