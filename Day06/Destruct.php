<?php

    class Student {
        public $id;
        public $name;
        public $age;

        public function __construct($id, $name, $age)
        {
            $this->id = $id;
            $this->name = $name;
            $this->age = $age;
        }

        function __destruct() {
            echo "Student Information : <br>";
            echo "Id : " . $this->id . "<br>";
            echo "Name : " . $this->name . "<br>";
            echo "Age : " . $this->age . "<br>";
        }
    }

    $studentA = new Student(1, "Vitou", 25);

    $studentB = new Student(2, "Dara", 20);

    $studentC = new Student(3, "Sreyleak", age: 18);

