<?php

    $cars = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);

    // echo '<pre>' , var_dump($cars) , '</pre>';

    $cars["model"] = "Toyota";

    echo "Brand : " . $cars["brand"] . "<br>";
    echo "Model : " . $cars["model"] . "<br>";
    echo "Year : ". $cars["year"] . "<br>";

    echo "<h2>Output with Loops</h2>";

    foreach($cars as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }

    echo "<h2>Output with Loops without key</h2>";

    foreach($cars as $value) {
        echo  $value . "<br>";
    }