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
        <br>
        <input type="submit" value="SUBMIT">
    </form>

    <!-- Menggunakan method GET -->
    <h4>Menggunakan Method GET</h4>
    <form action="proses.php" name="form" method="GET">
        Nilai : <input type="text" name="angka"> <br>
        <br>
        <input type="submit" value="SUBMIT">
    </form>
</body>

</html>