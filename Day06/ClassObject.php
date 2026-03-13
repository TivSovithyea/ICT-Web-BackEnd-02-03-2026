<?php

    class Fruit {
        //property
        public $name;
        public $color;
    }

    $apple = new Fruit();
    $apple->name = "Apple";
    $apple->color = "Red";

    echo "<br>This is $apple->color $apple->name";

    $appleGreen = new Fruit();
    $appleGreen->name = "Apple";
    $appleGreen->color = "Green";

    echo "<br>This is $appleGreen->color $appleGreen->name";

    var_dump($apple instanceof Fruit);