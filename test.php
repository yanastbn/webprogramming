<?php

    $first = 1;
    $second = 2;
    $third = "3";
    $hello = "Hello World";

    echo "$first<br>";
    echo "$second<br>";
    echo "$third<br>";
    echo "$hello<br>";

    $sum = $first + $second;
    echo $sum;
    $sum = $first + $third;
    echo "<br>$sum";
    $sum = $second + $hello;
    echo "$sum<br>";
    // unset($first);
    $first = 5;
    if($first){
        echo $first;
    }else{
        echo 'Im false!';
    }

    if($first > $second){
        echo 'First is greater than second';
    }
?>