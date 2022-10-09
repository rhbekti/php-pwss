<form action="settanggal.php" method="post">
    <fieldset>
        Tgl
        <select name="angka_hari">
            <?php
            for ($hari = 1; $hari <= 31; $hari++) {
                $htgl = str_pad($hari, 2, "0", STR_PAD_LEFT);
                echo "<option value='$htgl'>$htgl</option>";
            }
            ?>
        </select>
        Bulan
        <select name="bulan">
            <?php
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $bln = str_pad($bulan, 2, "0", STR_PAD_LEFT);
                echo "<option value='$bln'>$bln</option>";
            }
            ?>
        </select>
        Tahun
        <select name="tahun">
            <?php
            $tahun_sekarang = date('Y');
            $tahun_awal = $tahun_sekarang - 10;
            $tahun_akhir = $tahun_sekarang + 10;
            for ($tahun = $tahun_akhir; $tahun >= $tahun_awal; $tahun--) {
                echo "<option value='$tahun'>$tahun</option>";
            }
            ?>
        </select>
    </fieldset>
    <input type="submit" value="SET TANGGAL">
</form>
