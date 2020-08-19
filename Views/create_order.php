<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get cart from session
$cart = Session::get("cart");

// create order
$cart->makeOrder();

// reset cart in session
$_SESSION["cart"] = new Cart();

// redirect to order completion page
header('location: orderSuccess.php');