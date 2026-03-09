<?php

    $numbers = [15, 5, 60, 20, 50];

    // 50

    // echo count($numbers);

    $result = $numbers[0];

    for($i = 1; $i <= count($numbers) - 1; $i++) {
        if($numbers[$i] > $result) {
            $result = $numbers[$i];
        }
    }

    echo $result;


    $number;

    if(isset($number)) {
        echo "$number";
    }