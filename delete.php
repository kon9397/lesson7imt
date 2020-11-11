<?php

session_start();

require_once __DIR__ .'/Classes/Cart.php';

if(isset($_SESSION['cart'])) {
    $cart = unserialize($_SESSION['cart']);

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];

        $cart->deleteItem($id);

        $_SESSION['cart'] = serialize($cart);

        header('Location: /list.php');

    }
} else {
    header('Location: /list.php');
}


