<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/ErrorHandler.php");
require_once("../Controllers/Security/Validator.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/CartSaver.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

$cart = Session::get("cart");
//$cartSaver = Session::get("cartSaver");

//echo "old cart: " . $cartSaver->cartMemento->items[0]->quantity; // DEBUG
//echo "<br>new cart: " . $cart->items[0]->quantity; // DEBUG

$cart->restore();

// redirect back to cart page
header('location: cart.php');