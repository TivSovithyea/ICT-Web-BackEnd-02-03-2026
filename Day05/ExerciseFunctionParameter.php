<?php

    echo "First Exercise <br>";

    function findLargestNumber($number1, $number2) {
        if($number1 > $number2) {
            echo "The Largest number is $number1";
        } else if($number2 > $number1) {
            echo "The Largest number is $number2";
        } else {
            echo "Both Number are equals";
        }
    }

    findLargestNumber(15, 15);

    echo "<br>Second Exercise <br>";

    function loopText($text, $number) {
        if(is_numeric($number)) {
            for($i = 0; $i < $number; $i++) {
                echo $text . "<br>";
            }
        } else {
            echo "Second Parameter Must be Numeric";
        }
    }

    loopText("Hello My Friend", number: "5");