<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Buku</title>
    <style>
        .konten {
            width: 300px;
            border: 1px solid #000;
            padding: 10px;
            margin: 10px auto;
        }
    </style>
</head>

<body>
    <div class="konten">
        <h3>Cari Buku</h3>
        <hr>
        <form action="buku_tampil.php" method="post">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input type="text" name="pengarang"></td>
                </tr>
            </table>

            <hr>
            <button type="submit">Cari</button>
        </form>
    </div>
</body>

</html>
