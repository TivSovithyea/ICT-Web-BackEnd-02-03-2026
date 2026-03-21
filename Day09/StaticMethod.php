<?php

    class Purchase {
        public static function create() {
            echo "Creating Purchase Transaction.";
        }

        public static function update() {
            echo "Updating Purchase Transaction.";
        }
    }

    Purchase::create();
    Purchase::update();