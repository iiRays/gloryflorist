<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/CartSaver.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get input details
$grandTotal = $_POST['grandTotal'];
$deliveryAddress = $_POST['deliveryAddress'];
$targetDate = $_POST['targetDate'];

// get cart from session
$cart = Session::get("cart");

// create order
$cart->makeOrder($grandTotal, $deliveryAddress, "Pending", $targetDate);

// reset cart and cartsaver in session
$_SESSION["cart"] = new Cart();
$_SESSION["cartSaver"] = new CartSaver();

// redirect to order completion page
header('location: orderSuccess.php');