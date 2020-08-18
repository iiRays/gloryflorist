<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get post data
$quantities = explode(",", $_POST['quantities']);

echo $quantities[0];

// get cart from session
$cart = Session::get("cart");

// update cart
for ($i = 0; $i < sizeof($cart->items); $i++) {
    $cart->items[$i]->quantity = $quantities[$i];
    //echo "<script>alert(".$cart->items[$i]->quantity.");</script>"; // debug
}
        
// save cart to session
$_SESSION["cart"] = $cart;

// redirect back to cart page
header('location: cart.php');