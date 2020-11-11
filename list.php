<?php

    session_start();

    require_once __DIR__ .'/Data/products.php';
    require_once __DIR__ .'/Classes/Cart.php';

    if(isset($_SESSION['cart'])) {
        $cart = unserialize($_SESSION['cart']);
    } else {
        $cart = new Cart();
    }

    if($_POST['submit']) {

        $currentId = (int) $_POST['submit'];
        $newQuantity = (int) $_POST['quantity'];


        $cart->setQuantity($currentId, $newQuantity);

        $_SESSION['cart'] = serialize($cart);

    }

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
<h2>Ваша корзина</h2>
<table>
    <tr>
        <th>Название товара</th>
        <th>Количество</th>
        <th>Сумма за 1 шт</th>
    </tr>
    <?php if(count($cart->getItems()) > 0): ?>
    <?php foreach ($cart->getItems() as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td>
                <form method="post">
                    <input name="quantity" type="number" value="<?= $item['quantity'] ?>"><br>
                    <button name="submit" value="<?= $item['id']?>" type="submit">Поменять кол-во</button>
                </form>
            </td>
            <td><?= $item['price'] ?></td>
            <td><a href="delete.php?id=<?= $item['id'] ?>">Удалить</a></td>
        </tr>



    <?php endforeach; ?>
</table>
<h3>Cумма товара: <?= $cart->getSum() ?></h3>
<p>Скидка предоставляется только если количество товара больше 20 единиц или сумма товара больше 2000 грн. Ваша скидка: <?php echo $cart->getDiscount() == 0 ? '0' : $cart->getDiscount() ?>%</p>
<?php else:?>
    </table>
    <h3>Товара нет</h3>
    <a href="add.php">Добавить</a>
<?php endif; ?>



</body>
</html>
