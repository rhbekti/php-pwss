<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>

<body>
    <!-- Menggunakan method POST -->
    <h4>Menggunakan Method POST</h4>
    <form action="proses.php" name="form" method="post">
        Nilai : <input type="text" name="angka"> <br>
        </br>
        Jurusan :
        <select name="jurusan">
            <option value=" " disabled> Pilih </option>
            <option value="TI"> Teknik Informatika </option>
            <option value="SI"> Sistem Informasi </option>
            <option value="MI"> Manajemen Informatika </option>
            <option value="TK"> Teknik Komputer </option>
            <option value="KA"> Komputerisasi Akuntansi </option>
        </select>
        </br>
        <input type="submit" value="SUBMIT">
    </form>
</body>

</html>
