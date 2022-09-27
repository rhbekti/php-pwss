<?php
/*
    aturan :
    biaya parkir motor 2000 per 1 jam ++ 1000
    biaya parkir mobil 5000 per 1 jam ++ 1500
    biaya parkir awal = 0
*/
// set nilai awal untuk kuitansi
$jenis = "Belum Ada";
$jam = 0;
$biaya = 0;

if (isset($_POST['submit'])) {
    $jenis = htmlspecialchars($_POST['jenis']);
    $jam = htmlspecialchars($_POST['jam']);

    // cek dulu jenis kendaraan
    if ($jenis == "motor") {
        // cek lama kendaraan parkir
        if ($jam <= 1) {
            $biaya = 2000;
        } else {
            $biaya = (($jam - 1) * 1000) + 2000;
        }
    } elseif ($jenis == "mobil") {
        // cek lama kendaraan parkir
        if ($jam <= 1) {
            $biaya = 5000;
        } else {
            $biaya = (($jam - 1) * 1500) + 5000;
        }
    } else {
        echo "<script>alert('Jenis Kendaraan tidak diketahui');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkiran UTDI</title>
    <style>
        #kotak {
            margin: 3px auto;
            width: 300px;
        }

        #form-parkir {
            margin-top: 15px;
            border: solid 1px #000;
            padding: 20px;
        }

        #form-parkir div {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col" id="kotak">
                <h3>PARKIRAN UTDI</h3>
                <marquee>Selamat Datang di Parkiran</marquee>
                <form action="" method="POST" id="form-parkir">
                    <div>
                        <label for="jenis">Jenis Kendaraan</label> <br>
                        <select name="jenis" id="jenis">
                            <option selected disabled>-- Pilih Kendaraan --</option>
                            <option value="motor">Motor</option>
                            <option value="mobil">Mobil</option>
                        </select>
                    </div>
                    <div>
                        <label for="jam">Lama Parkir (jam)</label>
                        <input type="number" name="jam" id="jam">
                    </div>
                    <div>
                        <button type="submit" name="submit">Kirim</button>
                    </div>
                </form>
                <br>
                <hr>
                <div class="kuitansi">
                    <h4>Biaya Parkir di UTDI</h4>
                    <div>
                        <p>Jenis : <?=$jenis;?></p>
                        <p>Lama : <?=$jam;?></p>
                        <p>Biaya : <?=$biaya;?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
