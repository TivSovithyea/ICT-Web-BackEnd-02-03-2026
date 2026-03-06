<?php

    echo "Ex 01 <br>";

    for($i = 1; $i <= 10; $i++) {
        echo "$i <br>";
    }

    echo "Ex 02 <br>";

    for($i = 1; $i <= 20; $i++) {
        if($i % 2 == 0) {
            echo "$i <br>";
        }
    }

    echo "Ex 03 <br>";

    $number = 5;

    for($i = 2; $i <= 10; $i++) {
        $multiplication = $number * $i;
        echo "$number x $i = $multiplication <br>";
    }

    echo "Ex 04 <br>";

    for($i = 1; $i <= 10; $i++) {
        for($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }