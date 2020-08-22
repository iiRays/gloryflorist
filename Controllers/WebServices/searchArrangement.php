<?php

require_once("../Util/Quick.php");
require_once("../Util/rb.php");
require_once("../Util/DB.php");

DB::connect();

header("Content-Type:application/json");

$arrangementId = Quick::getGetData("arrangementId");
$arrangement = R::load("arrangement", $arrangementId);

if (!$arrangement->id) {
    response(200, "false", null);
} else {
    response(200, "true", $arrangement);
}

function response($status, $hasData, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['hasData'] = $hasData;
    $response['data'] = $data;

    $json = json_encode($response);
    echo $json;
}