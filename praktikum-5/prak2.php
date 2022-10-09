<form action="#" method="post">
    Nominal Rp. <input type="text" name="nominal"> <br>
    <input type="submit" value="SUBMIT">
</form>

<?php
    $nominal = isset($_POST["nominal"]) ? $_POST["nominal"] : 0;
    $format = number_format($nominal);
    echo "Format Nominal : Rp. $format";
?>
