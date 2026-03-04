<?php

// Exercise 01

echo "Excercise 01 <br>";

$number = 10;

if ($number % 2 == 0) {
    echo "The number is Even.";
} else {
    echo "The number is Odd.";
}

echo "<br>Excercise 02 <br>";


$score = 50;

if ($score >= 90 && $score <= 100) {
    echo "Your grade is A +";
} else if ($score >= 80 && $score < 90) {
    echo "Your grade is A";
} else if ($score >= 70 && $score < 80) {
    echo "Your grade is B";
} else if ($score >= 60 && $score < 70) {
    echo "Your grade is C";
} else if ($score >= 50 && $score < 60) {
    echo "Your grade is D";
} else if ($score >= 0 && $score < 50) {
    echo "Your grade is F";
} else {
    echo "Invalid Score from Table";
}
