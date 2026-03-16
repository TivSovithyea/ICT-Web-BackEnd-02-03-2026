<?php


    class BankAccount {
        public $owner;
        protected $balance;
        private $pin;
        private $pi = 3.14;

        public function __construct($owner, $balance, $pin)
        {
            $this->owner = $owner;
            $this->balance = $balance;
            $this->pin = $pin;
        }

        public function resetPin() {
            $this->pin = '0000';
        }

        public function changePin($newPin) {
            $this->pin = $newPin;
        }
    }

    class Savings extends BankAccount {

        public function addInterest() {
            $this->balance *= 1.05;
        }
    }

    $account = new BankAccount("Dara", 5000, 2505);

    $account->changePin("1505");