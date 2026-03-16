<?php

class User {
    private $permissions;
    private const VALID = ['read', 'write', 'admin'];

    public function grant($p) {
        if(!in_array($p, self::VALID)) {
            throw new InvalidArgumentException("Unknown Permission $p");
        }
        $this->permissions[]= $p;
    }

    public function can($p) {
        return in_array($p, $this->permissions);
    }
}

$user = new User();
$user->grant("read");
$user->grant("write");
$user->grant("admin");
var_dump($user->can("admin"));