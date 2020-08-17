<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/Cart.php";

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');
$cart = new Cart();
$cart->addItem("1", 3);
$cart->addItem("2", 5);
//$cart->makeOrder();

