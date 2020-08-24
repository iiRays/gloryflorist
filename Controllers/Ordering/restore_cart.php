<?php

include "../Util/rb.php";
include "../Util/DB.php";
require_once("../Security/Session.php");
require_once("../Security/ErrorHandler.php");
require_once("../Security/Validator.php");
require_once("../Util/Cart.php");
require_once("../Util/CartSaver.php");
require_once("../Util/Item.php");
require_once("../Util/Quick.php");

DB::connect();

$cartAdapter = Session::get("cartAdapter");
//$cartSaver = Session::get("cartSaver");

//echo "old cart: " . $cartSaver->cartMemento->items[0]->quantity; // DEBUG
//echo "<br>new cart: " . $cart->items[0]->quantity; // DEBUG

$cartAdapter->restore();

// redirect back to cart page
Quick::redirect("/Views/cart.php");