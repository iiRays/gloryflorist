<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLFactory.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/CartItem.php");
require_once("../Controllers/Util/Item.php");
require_once("../Controllers/Security/Session.php");

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');

// get cart from session
$cart = Session::get("cart");

$totalPrice = 0;
$cartItems = [];
foreach ($cart->items as $item) {
    $price = $item->arrangement->cost * $item->quantity;
    $cartItems[] = new CartItem($item->arrangement->name, $item->quantity, $price);
    $totalPrice += $price;
}

$totalPriceArr = []; // lazy coder moment
$totalPriceArr[] = new CartItem("Total price", 1, $totalPrice); // there's only ever gonna be 1 item in totalPriceArr

$factory = new XMLFactory("confirmOrder");
$xml = $factory->build();
$xml->appendXML($cartItems, "items");
$xml->appendXML($totalPriceArr, "totalPriceArr");
echo $xml->styleWith("confirmOrderStyle.xsl");
