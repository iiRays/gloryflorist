<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// simulate cart in session
$cart = new Cart();
$cart->addItem("1", 3);
$cart->addItem("2", 5);

// create order
$cart->makeOrder();

// redirect to order completion page
// TODO