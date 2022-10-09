<form action="#" method="post">
    <fieldset>
        <legend>Kode Barang</legend>
        Kode Depan (Jenis) <br>
        <select name="jenis">
            <option value="">-- Pilih --</option>
            <option value="C">Celana</option>
            <option value="K">Kaos</option>
            <option value="H">Hem</option>
        </select> <br>
        Kode Tengah (Nomor Seri) <br>
        <input type="text" name="nomor_seri" maxlength="6"> <br>
        Kode Belakang (Merk) <br>
        <input type="text" name="merk">
    </fieldset>
    <input type="submit" value="BUAT KODE">
</form>

<?php
    $kode = [];

    if(isset($_POST["jenis"]) and !empty($_POST["jenis"])){
        $kode[] = $_POST["jenis"];
    }
    if(isset($_POST["nomor_seri"]) and !empty($_POST["nomor_seri"])){
        $kode[] = str_pad($_POST["nomor_seri"],6,"0",STR_PAD_LEFT);
    }
    if(isset($_POST["merk"]) and !empty($_POST["merk"])){
        $kode[] = $_POST["merk"];
    }

    $banyak_array = count($kode);
    if($banyak_array == 3){
        $set_kode = implode("-",$kode);
        echo "Kode Barang : $set_kode";
    }
?>
