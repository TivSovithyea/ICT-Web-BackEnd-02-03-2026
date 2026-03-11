<?php

$x = 10;

function showMyInformation() {
    echo $GLOBALS["x"];
    echo "My name is Dara Sok <br>";
    echo "I'm 20 years old <br>";
    echo "I'm study IT <br>";
}

showMyInformation();