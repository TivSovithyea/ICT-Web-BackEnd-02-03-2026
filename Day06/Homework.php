<?php

    echo "<br>First Homework.<br>";

    function calculateFahrenheit() {
        $celcius = 33;
        $fahrenheit = 0;

        $fahrenheit = $celcius * 9 / 5 + 32;

        return $fahrenheit;
    }

    echo "Celcius 33 is equal to Frahrenheit " . calculateFahrenheit();

    echo "<br>Second Homework.<br>";


    function calculateSquare() {
        $x = 5;

        $x *= $x;

        return $x;
    }

    echo "The Square of 5 equal to " . calculateSquare();

    echo "<br>Third Homework.<br>";

    function sumNaturalNumber() {

        $x = 15;

        $result = ($x * ($x + 1)) / 2;

        return $result;
    }

    echo "The result of Natural Number of 15 is " . sumNaturalNumber();