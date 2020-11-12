<?php
require_once __DIR__ . '/Data/users.php';


session_start();

if(isset($_SESSION['id'])) {
    header('Location: /index.php');
}

if(isset($_POST['login']) && isset($_POST['password'])) {
    $authUser = new User($_POST['login'], $_POST['password']);

    foreach ($users as $user) {
        if($user['login'] === $authUser->login) {
            $auth = $authUser->autendificated($user['password']);
            if($auth) {

                $_SESSION['id'] = $user['id'];
                header('Location: /index.php');
            };
        }
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Войти</title>
</head>
<body>
<form method="post">
    <input type="text" name="login" placeholer="Введите login">
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>
</form>
</body>
</html>