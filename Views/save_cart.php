<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/ErrorHandler.php");
require_once("../Controllers/Security/Validation.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get post data
$quantities = explode(",", $_POST['quantities']);

// validate quantities
$errorHandler = new ErrorHandler();
for ($i = 0; $i < sizeof($quantities); $i++) {
    if (!Validation::validateNumOnly($quantities[$i]) || $quantities < 0) {
        $errorHandler->addError("Quantity of item #" . ($i + 1) . " is invalid - it must be a positive numeric value.");
    }
}

if (!$errorHandler->errorsExist()) {
    // get cart from session
    $cart = Session::get("cart");

    // update cart
    for ($i = 0; $i < sizeof($cart->items); $i++) {
        $cart->items[$i]->quantity = $quantities[$i];
        //echo "<script>alert(".$cart->items[$i]->quantity.");</script>"; // debug
    }

    // save cart to session
    Session::set("cart", $cart);
} else {
    // update error in session
    Session::set("error", $errorHandler->getErrors());
}

// redirect back to cart page
header('location: cart.php');