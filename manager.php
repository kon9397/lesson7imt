<?php
    session_start();

    require_once __DIR__ . '/Data/users.php';

    $authUser = null;
    if(isset($_SESSION['id'])) {

        foreach ($users as $user) {
            if($user['id'] === $_SESSION['id']) {
                if(!($user['role'] === 'admin' || $user['role'] === 'manager' )) {

                    header('HTTP/1.0 403 Forbidden');
                    die('Извините у вас нет прав');
                } else {
                    if($user['role'] === 'admin') {
                        $authUser = new Admin($user['login'], $user['password']);
                        $role = "Администратор";
                    } else {
                        $authUser = new Manager($user['login'], $user['password']);
                        $role = "Менеджер";
                    }


                    $authUser->name = $user['name'];
                    $authUser->surname = $user['surname'];
                    if(isset($user['lang'])) {
                        $authUser->lang = $user['lang'];
                    } else {
                        $authUser->lang = 'ru';
                    }
                }



            }
        }
    } else {
        header('Location: /auth.php');
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Привет <?= $role . ' ' . $authUser->name . ' ' . $authUser->surname ?></h1>
</body>
</html>