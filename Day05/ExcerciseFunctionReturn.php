<?php

    echo "First Exercise <br>";

    function calculator() {
        $number = 4;
        $result = 1;

        while($number != 0) {
            $result *= $number;

            $number --;
        }

        return $result;
    }

    $result = calculator();

    echo $result;