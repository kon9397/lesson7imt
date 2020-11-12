<?php

require_once __DIR__ . "/User.php";

class Admin extends User
{
    public $role = 'admin';
}