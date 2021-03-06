<?php
require_once 'Data/users.php';

session_start();

$authUser = null;
if(isset($_SESSION['id'])) {
    foreach ($users as $user) {
        if($user['id'] === $_SESSION['id']) {
            if($user['role'] === 'admin') {
                $authUser = new Admin($user['login'], $user['password']);
                $role = "Администратор";
            } elseif($user['role'] === 'manager') {
                $authUser = new Manager($user['login'], $user['password']);
                $role = "Менеджер";
            } elseif($user['role'] === 'client') {
                $authUser = new Client($user['login'], $user['password']);
                $role = "Клиент";
            } else {
                $authUser = new User($user['login'], $user['password']);
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

<?php if(isset($authUser)): ?>
<h1>Привет <?= $role . ' ' . $authUser->name . ' ' . $authUser->surname ?></h1>
    <a href="add.php">Перейти в корзину</a>
    <a href="<?= $authUser->role ?>.php">Перейти в личный кабинет</a>

<?php else: ?>
<h1>Привет незнакомец</h1>
    <a href="auth.php">Авторизоваться</a>

<?php endif; ?>
</body>
</html>