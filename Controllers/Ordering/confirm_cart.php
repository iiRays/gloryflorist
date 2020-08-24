<?php

include "../Util/rb.php";
include "../Util/DB.php";
require_once("../Security/Session.php");
require_once("../Security/ErrorHandler.php");
require_once("../Security/Validator.php");
require_once("../Util/Cart.php");
require_once("../Util/Item.php");
require_once("../Util/Quick.php");

DB::connect();

$cartAdapter = Session::get("cartAdapter");

// validate quantities
$errorHandler = new ErrorHandler();
if (sizeof($cartAdapter->getItems()) == 0) {
    $errorHandler->addError("Your cart must have at least 1 item in order to proceed.");
}

if ($errorHandler->errorsExist()) {
    Session::set("error", $errorHandler->getErrors());
    Quick::redirect("/Views/cart.php");
} else {
    Quick::redirect("/Views/confirmOrder.php");
}