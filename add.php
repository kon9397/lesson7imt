<?php
    session_start();

    require_once __DIR__ .'/Data/products.php';
    require_once __DIR__ .'/Classes/Cart.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Интернет магазин элитных овощей</title>
</head>
<body>

<?php

if(isset($_POST['products']) && isset($_POST['quantity'])) {


    if(isset($_SESSION['cartId'])) {
        $id = (int) $_SESSION['cartId'];
    } else {
        $_SESSION['cartId'] = 1;
        $id = $_SESSION['cartId'];
    }


    if(isset($_SESSION['cart'])) {
        $cart = unserialize($_SESSION['cart']);
    } else {
        $cart = new Cart();
    }
    $cart->setItems(
        [
            'id' => $id,
            'name' => $products[$_POST['products']]['name'],
            'quantity' => (int)$_POST['quantity'],
            'price' => $products[$_POST['products']]['price']
        ]);
    $_SESSION['cartId'] = $_SESSION['cartId']+1;

    $_SESSION['cart'] = serialize($cart);
}
?>
<form method="POST">
    <select name="products" id="products">
        <?php foreach ($products as $key=>$product): ?>
            <option value="<?=$key ?>"><?= $product['name']?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="quantity" value="1">
    <button type="submit">Добавить в корзину</button>

</form>
<a href="list.php">Перейти в корзину</a>

</body>
</html>