<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/CartSaver.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get input details
//$deliveryAddress = $_POST['deliveryAddress'];
//$targetDate = $_POST['targetDate'];

// get cart from session
$cart = Session::get("cart");

// calculate grand total
$grandTotal = 0;
foreach ($cart->items as $item) {
    $grandTotal += $item->arrangement->price * $item->quantity;
}

// create order
$cart->makeOrder($grandTotal, "Pending");

// reset cart and cartsaver in session
$_SESSION["cart"] = new Cart();
$_SESSION["cartSaver"] = new CartSaver();

// redirect to order completion page
header('location: orderSuccess.php');