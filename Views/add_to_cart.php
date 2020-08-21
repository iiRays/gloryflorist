<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/ErrorHandler.php");
require_once("../Controllers/Security/Validator.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get cart from session
$cart = Session::get("cart");

// backup cart
$cartSaver = Session::get("cartSaver");
$cartSaver->backup($cart);
Session::set("cartSaver", $cartSaver);
    
// create updated cart
$newCart = new Cart();
foreach ($cart->items as $item) {
    $newCart->addItem($item->arrangement->id, $item->quantity);
}

// add new product to updated cart
$itemId = $_GET['id'];
$newCart->addItem($itemId, 1);

// save cart to session
$newCart->save();

// redirect to cart page
header('location: cart.php');