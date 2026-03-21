<?php

    class pi {
        public static $value = 3.14159;

        public function staticValue() {
            return self::$value;
        }
    }

    // echo pi::$value;

    $pi = new pi();
    echo $pi->staticValue();

    class x extends pi {
        public function xStatic() {
            return parent::$value;
        }
    }

    echo x::$value;

    $x = new x();
    echo $x->xStatic();