<?php

include "../Util/rb.php";
include "../Util/DB.php";
require_once("../Security/Session.php");
require_once("../Util/Cart.php");
require_once("../Util/CartSaver.php");
require_once("../Util/Item.php");
require_once("../Util/Quick.php");

DB::connect();

// get input details
//$deliveryAddress = $_POST['deliveryAddress'];
//$targetDate = $_POST['targetDate'];

// get cart from session
$cartAdapter = Session::get("cartAdapter");

// calculate grand total
$grandTotal = 0;
foreach ($cartAdapter->getItems() as $item) {
    $grandTotal += $item->arrangement->price * $item->quantity;
}

// create order
$cartAdapter->makeOrder($grandTotal, "Pending");


// reset cart and cartsaver in session
$_SESSION["cartAdapter"] = new CartAdapter();
$_SESSION["cartSaver"] = new CartSaver();

// redirect to order completion page
Quick::redirect("/Views/orderSuccess.php");