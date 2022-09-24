<?php
// for ($i=1; $i <= 5; $i++) {
//     echo "<br> for ke $i.";
// }
// for ($i=1; $i < 10; $i++) {
//     echo "<br> for ke $i.";
// }
// for ($i=1; $i < 10; $i+=2) {
//     echo "<br> for ke $i.";
// }
// $awal = $_POST['awal'];
// $akhir = $_POST['akhir'];
// for($i=$awal;$i <= $akhir;$i++){
//     echo "<br> for ke $i.";
// }
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
// $berhenti = $_POST['henti'];
$lanjutkan = $_POST['lanjut'];
for($i=$awal;$i <= $akhir;$i++){
    if($i == $lanjutkan){
        continue;
    }
    echo "<br> for ke $i.";
}
