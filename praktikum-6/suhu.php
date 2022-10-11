<?php
if(isset($_POST['konversi'])) :
    $celcius = htmlspecialchars($_POST['celcius']);
    $kelvin = 273.15 * $celcius;
    $fahrenheit = 32 + (1.8 * $celcius);
?>
<h1>Hasil Konversi Suhu Celcius ke Kelvin dan Fahrenheit</h1>
<table>
    <tbody>
        <tr>
            <td>Derajat Celcius</td>
            <td><?=": ".$celcius;?></td>
        </tr>
        <tr>
            <td>Derajat Kelvin</td>
            <td><?=": ".$kelvin;?></td>
        </tr>
        <tr>
            <td>Derajat Fahrenheit</td>
            <td><?=": ".$fahrenheit;?></td>
        </tr>
    </tbody>
</table>
<?php else : ?>
<h1>Konversi Suhu Celcius ke Kelvin dan Fahrenheit</h1>
<form action="" method="post">
    Suhu Celcius : <input type="text" name="celcius">
    <hr>
    <button type="submit" name="konversi">KONVERSI</button>
</form>
<?php endif; ?>
