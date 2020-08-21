<?php

require_once("../Util/Quick.php");
include "../Util/rb.php";
include "../Util/DB.php";

DB::connect();

header("Content-Type:application/json");

$orderId = Quick::getGetData("orderId");
$order = R::load("orders", $orderId);

if (!$order->id) {
    response(200, "false", null);
} else {
    response(200, "true", $order);
}

function response($status, $hasData, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['hasData'] = $hasData;
    $response['data'] = $data;

    $json = json_encode($response);
    echo $json;
}