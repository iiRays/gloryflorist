<?php

require_once("../Util/rb.php");
require_once("../Util/DB.php");

DB::connect();

header("Content-Type:application/json");

$orderItems = R::find('orderitem', "id != ?", [""], "ORDER BY id DESC");

if (count($orderItems) == 0) {
    response(200, "false", null);
} else {
    // Result
    $result = array();
    
    foreach ($orderItems as $orderitem) {
        $resultItem = array();

        $resultItem["id"] = $orderitem->id;
        $resultItem["quantity"] = $orderitem->quantity;
        $resultItem["arragement"] = $orderitem->arrangement_id;
        $resultItem["order"] = $orderitem->order_id;

        array_push($result, $resultItem);
    }
    response(200, "true", $result);
}

function response($status, $hasData ,$data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['hasData'] = $hasData;
    $response['data'] = $data;

    $json = json_encode($response);
    echo $json;
}
