<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
    <style>
        .kotak {
            width: 500px;
            border: 1px solid #333333;
            padding: 10px;
            margin: 30px auto;
        }
    </style>
</head>

<body>
    <div class="kotak">
        <h2>INPUT BUKU</h2>
        <hr>
        <form action="buku_simpan.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Kode</td>
                    <td><input type="text" name="kode"></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input type="text" name="pengarang"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok"></td>
                </tr>
                <tr>
                    <td>Foto Sampul</td>
                    <td><input type="file" name="foto"></td>
                </tr>
            </table>
            <hr>
            <button type="submit" name="proses">Simpan</button>
            <button type="reset" name="reset">Reset</button>
        </form>
    </div>
</body>

</html>
