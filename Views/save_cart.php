<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/ErrorHandler.php");
require_once("../Controllers/Security/Validator.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

// get post data
$quantities = explode(",", $_POST['quantities']);

// validate quantities
$errorHandler = new ErrorHandler();
for ($i = 0; $i < sizeof($quantities); $i++) {
    if (!$errorHandler->isNum($quantities[$i]) || $quantities[$i] < 0) {
        $errorHandler->addError("Quantity of item #" . ($i + 1) . " is invalid - it must be a positive numeric value.");
    }
}

if (!$errorHandler->errorsExist()) {
    // get cart from session
    $cart = Session::get("cart");
    
    // backup cart
    $cartSaver = Session::get("cartSaver");
    $cartSaver->backup($cart);
    Session::set("cartSaver", $cartSaver);
    
    // create updated cart
    $newCart = new Cart();
    $i = 0;
    foreach ($cart->items as $item) {
        if (!$quantities[$i] == 0) {
            $newCart->addItem($item->arrangement->id, $quantities[$i]);
        }
        $i++;
    }
    
    //echo "<br>old cart: " . $cartSaver->cartMemento->items[0]->quantity; // DEBUG
    //echo "<br>new cart: " . $newCart->items[0]->quantity; // DEBUG

    // save cart to session
    $newCart->save();
} else {
    // update error in session
    Session::set("error", $errorHandler->getErrors());
}

// redirect back to cart page
header('location: cart.php');