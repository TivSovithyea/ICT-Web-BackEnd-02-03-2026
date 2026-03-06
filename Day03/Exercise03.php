<?php

    echo "Sum of digits of a number in factorial : ";

    $number = 6;
    $result = 1;

    while($number != 0) {
        $result *= $number;
        // 1 loop
        // 1 = 1 * 5 => result = 5
        // 2 loop
        // 5 = 5 * 4 => result = 20
        // 3 loop
        // 20 = 20 * 3 => result = 60
        // 4 loop
        // 60 = 60 * 2 => result = 120
        // 5 loop
        // 120 = 120 * 1 => result = 120

        $number --;
    }

    echo $result;