<h2>Nama Mahasiswa</h2>
<form action="mahasiswa.php" method="post">
    <ol>
        <?php
            for($a = 1;$a <= 9;$a++){
                echo "<li> <input type='text' name='mahasiswa[$a]'/> </li>";
            }
        ?>
    </ol>
    <input type="submit" value="TAMPILKAN">
</form>
