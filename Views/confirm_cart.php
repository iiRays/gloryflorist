<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/ErrorHandler.php");
require_once("../Controllers/Security/Validator.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

DB::connect();

$cartAdapter = Session::get("cartAdapter");

// validate quantities
$errorHandler = new ErrorHandler();
if (sizeof($cartAdapter->getItems()) == 0) {
    $errorHandler->addError("Your cart must have at least 1 item in order to proceed.");
}

if ($errorHandler->errorsExist()) {
    Session::set("error", $errorHandler->getErrors());
    header('location: cart.php');
} else {
    header('location: confirmOrder.php');
}