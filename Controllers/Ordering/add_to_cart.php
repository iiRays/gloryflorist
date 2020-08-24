<?php

include "../Util/rb.php";
include "../Util/DB.php";
require_once("../Security/Session.php");
require_once("../Security/ErrorHandler.php");
require_once("../Security/Validator.php");
require_once("../Util/CartAdapter.php");
require_once("../Util/Item.php");
require_once("../Util/Quick.php");

DB::connect();

// get cart from session
$cartAdapter = Session::get("cartAdapter");

// get item id
$itemId = $_GET['id'];

// validate item availability
$errorHandler = new ErrorHandler();
if (!$errorHandler->isAvailableArrangement($itemId)) {
    $errorHandler->addError("Arrangement #" . $itemId . " is not available for purchase.");
}

// validate item not already in cart
if ($cartAdapter->itemExists($itemId)) {
    $errorHandler->addError("Arrangement #" . $itemId . " has already been added to your cart.");
}

if (!$errorHandler->errorsExist()) {
    // backup cart
    $cartAdapter->backup();

    // create updated cart
    $newCartAdapter = new CartAdapter();
    foreach ($cartAdapter->getItems() as $item) {
        $newCartAdapter->addItem($item->arrangement->id, $item->quantity);
    }

    // add new product to updated cart
    $newCartAdapter->addItem($itemId, 1);

    // save cart to session
    $newCartAdapter->save();
} else {
    // update error in session
    Session::set("error", $errorHandler->getErrors());
}

// redirect to cart page
Quick::redirect("/Views/cart.php");