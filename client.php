<?

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

</body>
</html>