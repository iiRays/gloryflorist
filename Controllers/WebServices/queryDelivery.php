<?php

require_once '../Util/Quick.php';
require_once '../Util/rb.php';
require_once '../Util/DB.php';

DB::connect();

header("Content-Type:application/json");

if (!empty($_GET['start']) && !empty($_GET['end'])) {

    $startDate = Quick::getGetData("start");
    $endDate = Quick::getGetData("end");
    $deliveryList = R::find("delivery", "date >= ? and date <= ?", [$startDate, $endDate]);

    if (count($deliveryList) == 0) {
        response(200, false, NULL);
    } else {
        response(200, true, $deliveryList);
    }
} else {
    response(400, "Invalid Request", NULL);
}

function response($status, $hasData, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['hasData'] = $hasData;
    $response['data'] = $data;
    $json_response = json_encode($response);
    echo $json_response;
}

?>
