<?php


class User
{
    public $name;
    public $surname;
    public $email;
    public $password;


    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function autendificated($pass) {
        if($pass === $this->password) {
            return true;
        }
    }

}