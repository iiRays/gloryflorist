<?php
include "Util/Quick.php";
include "Util/rb.php";

//Get query string
$query = Quick::getQueryStr();
$orderId = $query["id"];
$status = $query["status"];

if($orderId == null || $status == null){
    header("Location: ../Views/staffOrders.php");
    return;
}


//Obtain latest data
$order = R::find("orders", "where id = ?", [$orderId]);

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
        $order->status = "canceled";
        break;
}

R::store($order);

//Redirect
header("Location: ../Views/staffOrders.php");
return;