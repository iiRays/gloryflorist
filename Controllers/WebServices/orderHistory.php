<?php

require_once("../Util/rb.php");
require_once("../Util/DB.php");

DB::connect();

header("Content-Type:application/json");

$historyList = R::find('orderhistory', "name != ?", [""], "ORDER BY id DESC");
if (count($historyList) == 0) {
    response(200, "false", null);
} else {
    // Result
    $result = array();
    // Load the flowers related to each arrangement
    foreach ($historyList as $orderhistory) {
        $resultItem = array();
        
        $resultItem["id"] = $orderhistory->id;
        $resultItem["name"] = $orderhistory->name;
        $resultItem["price"] = $orderhistory->price;
        $resultItem["img"] = $orderhistory->image_url;
        $resultItem["stalks"] = $orderhistory->stalks;
        
        array_push($result, $resultItem);
    }

    response(200, "true", $result);
}

function response($status, $hasData, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['hasData'] = $hasData;
    $response['data'] = $data;


    $json = json_encode($response);
    echo $json;
}
