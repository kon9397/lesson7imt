<?php


class User
{
    public $name;
    public $surname;
    public $login;
    public $password;
    public $lang;


    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function autendificated($pass) {
        if($pass === $this->password) {
            return true;
        }
    }

    public function setLanguage($lang)
    {
       $this->lang = $lang;
    }

}