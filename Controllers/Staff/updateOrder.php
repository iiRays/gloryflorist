<?php
//To handle uncaught errors
require_once __DIR__ . '/../Security/Logger/LoggerFactory.php';
$logger = new LoggerFactory("UNCAUGHTERROR");
$logger->createLogger()->invalidLogger(null, null);

require_once("../Util/Quick.php");
require_once("../Util/rb.php");
require_once("../Util/DB.php");
require_once("../Security/Authorize.php");

Authorize::onlyAllow("staff");

//Get query string
$query = Quick::getQueryStr();
$orderId = $query["id"];
$status = $query["status"];


if($orderId == null || $status == null){
    header("Location: ../Views/staffOrders.php");
    return;
}

DB::connect();
//
//Obtain latest data
$order = R::load("orders", $orderId);

if($order == null){
    header("Location: ../Views/staffOrders.php");
    return;
}

// Change the status
switch($status){
    case "pending":
        $order->status = "pending";
        break;
    case "doing":
        $order->status = "doing";
        break;
    case "done":
        $order->status = "done";
        break;
     case "delivering":
        $order->status = "delivering";
        break;
    default:
        $order->status = "dropped";
        break;
}

R::store($order);

//Redirect
header("Location: ../../Views/staffOrders.php?success=".$status."&id=".$order->id);
return;