<?php

trait message1 {
    public function msg1() {
        echo "PHP OOP is fun! ";
    }
}

class Welcome {
    use message1;
}

class Welcome2 {
    use message1;
}

$welcome = new Welcome();
$welcome->msg1();