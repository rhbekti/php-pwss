<?php
$data_pilihan = [
    "PC" => "PC Komputer",
    "LP" => "Laptop",
    "PR" => "Peripheral",
    "SP" => "Smart Phone",
    "IP" => "i-Pad"
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 - Pertemuan 5</title>
    <style>
        .form-barang{
            width: 375px;
            margin:20px auto;
        }
        .form-barang div{
            margin: 3px 0px;
        }
    </style>
</head>

<body>
<?php
if(isset($_POST['kirim'])) : ?>
    <section class="kuitansi">
        <h2>Data Barang</h2>
        <hr>
        <table>
            <tbody>
                <tr>
                    <td>Kode Barang</td>
                    <td><?php
                    $nama = substr($_POST["nama"],0,3);
                    $noSeri = str_pad($_POST['noSeri'],2,"0",STR_PAD_LEFT);
                    $merk = substr($_POST["merk"],0,3);
                    $pembuat = substr($_POST["pembuat"],0,3);
                    echo " : ".$nama."/".$noSeri."/".$merk."/".$pembuat;
                    ?></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><?=" : ".htmlspecialchars($_POST['nama']);?></td>
                </tr>
                <tr>
                    <td>Nomor Seri</td>
                    <td><?=" : ".htmlspecialchars($_POST['noSeri']);?></td>
                </tr>
                <tr>
                    <td>Merk</td>
                    <td><?=" : ".htmlspecialchars($_POST['merk']);?></td>
                </tr>
                <tr>
                    <td>Buatan dari</td>
                    <td><?=" : ".htmlspecialchars($_POST['pembuat']);?></td>
                </tr>
                <tr>
                    <td>Tanggal dibuat </td>
                    <td><?=" : ".date('l , d M Y',mktime(0,0,0,$_POST['bulan'],$_POST['tanggal'],$_POST['tahun']));?></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><?=" : Rp. ".number_format(htmlspecialchars($_POST['harga']),0,",",".");?></td>
                </tr>
                <tr>
                    <td>Jumlah Stok</td>
                    <td><?=" : ".number_format(htmlspecialchars($_POST['jumlah']),0,",",".");?></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td><?=" : ".number_format((htmlspecialchars($_POST['jumlah'])*htmlspecialchars($_POST['harga'])),0,",",".");?></td>
                </tr>
            </tbody>
        </table>
    </section>
<?php else: ?>
    <section class="form-barang">
        <h2>Data Barang</h2>
        <hr>
        <form action="" method="post">
            <label for="nama">Nama Barang</label>
            <div>
                <input type="text" name="nama" id="nama">
            </div>
            <label for="jenis">Jenis</label>
            <div>
                <select name="jenis" id="jenis">
                    <?php foreach ($data_pilihan as $kodeJenis => $namaJenis) : ?>
                        <option value="<?= $kodeJenis; ?>"><?= $namaJenis; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="noSeri">Nomor Seri</label>
            <div>
                <input type="number" name="noSeri" id="noSeri">
            </div>
            <label for="merk">Merk</label>
            <div>
                <input type="text" name="merk" id="merk">
            </div>
            <label for="pembuat">Negara Pembuat</label>
            <div>
                <input type="text" name="pembuat" id="pembuat">
            </div>
            <fieldset>
                <legend>Tanggal Pembuatan</legend>
                <label for="tanggal">Tgl</label>
                <select name="tanggal" id="tanggal">
                    <?php
                    $tgl = 1;
                    while ($tgl <= 31) : ?>
                        <option value="<?= $tgl; ?>"><?= $tgl; ?></option>
                    <?php
                        $tgl++;
                    endwhile; ?>
                </select>
                <label for="bulan">Bulan</label>
                <select name="bulan" id="bulan">
                    <?php
                    $bln = 1;
                    while ($bln <= 12) : ?>
                        <option value="<?= $bln; ?>"><?= $bln; ?></option>
                    <?php
                        $bln++;
                    endwhile; ?>
                </select>
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun">
                    <?php
                    $tahun = date('Y');
                    $th_awal = $tahun - 5;
                    $th_akhir = $tahun + 5;
                    for ($th_akhir; $th_akhir >= $th_awal; $th_akhir--) : ?>
                        <option value="<?= $th_akhir; ?>"><?= $th_akhir; ?></option>
                    <?php
                    endfor; ?>
                </select>
            </fieldset>
            <label for="harga">Harga Barang</label>
            <div>
                Rp. <input type="number" name="harga" id="harga">
            </div>
            <label for="jumlah">Jumlah Stok</label>
            <div>
                <input type="number" name="jumlah" id="jumlah">
            </div>
            <hr>
            <button type="submit" name="kirim">SUBMIT</button>
            <button type="reset">RESET</button>
        </form>
    </section>
</body>

</html>
<?php endif; ?>
