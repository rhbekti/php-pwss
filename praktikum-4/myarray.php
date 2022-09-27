<?php
    $myArray[0] = "STIMIK";
    $myArray[1] = "AKAKOM";
    $myArray[2] = "Yogyakarta";
    $myArray[3] = "Yang Pertama dan Utama";

    // praktik 1
    for($i = 0;$i <= 3;$i++){
        echo "Array ke $i : $myArray[$i] <br>";
    }
    // praktik 2
    for($i = 0;$i <= 3;$i++){
        @print "Array ke $i : $myArray[$i] <br>";
    }
