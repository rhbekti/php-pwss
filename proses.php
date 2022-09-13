<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Proses</title>
</head>
<body>
    File Proses <hr>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $nilai = $_POST['angka'];
        echo "Nilai Anda = ".$nilai. "<br>";
    }else if($_SERVER['REQUEST_METHOD'] == "GET"){
        $nilai = $_GET['angka'];
        echo "Nilai Anda = ".$nilai. "<br>";
    }else{
        echo "Request tidak diketahui";
    }
    ?>
</body>
</html>