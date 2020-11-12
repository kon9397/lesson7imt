<?php

require_once __DIR__ . "/../Classes/User.php";
require_once __DIR__ . "/../Classes/Client.php";
require_once __DIR__ . "/../Classes/Admin.php";
require_once __DIR__ . "/../Classes/Manager.php";

$users = [
    ['id' => 1, 'login' => 'Vasisualiy', 'name'=>'Василий','surname'=>'Лоханкин', 'password' => '12345', 'lang' => 'ru','role'=>'admin'],
    ['id' => 2, 'login' => 'Afanasiy', 'name'=>'Афанасий','surname'=>'Цукерберг',  'password' => '54321', 'lang' => 'en','role'=>'client'],
    ['id' => 3, 'login' => 'Petro', 'name'=>'Петр','surname'=>'Инкогнито' ,'password' => 'EkUC42nzmu', 'lang' => 'ua','role'=>'manager'],
    ['id' => 4, 'login' => 'Pedrolus', 'name'=>'Педро','surname'=>'Миланов', 'password' => 'Cogito_ergo_sum', 'lang' => 'it','role'=>'client'],
    ['id' => 5, 'login' =>'Sasha','name'=>'Александр','surname'=>'Александров',  'password' => 'Ignorantia_non_excusat' ]
];

