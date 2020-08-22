<?php

include "../Util/rb.php";
include "../Util/DB.php";

DB::connect();

header("Content-Type:application/json");

$arrangement = R::find('arrangement', "is_available = ?", ["true"]);
$arr = array();
if (count($arrangement) == 0) {
    response(200, null);
} else {
    foreach ($arrangement as $item) {
        $result["id"] = $item->id;
        $result["name"] = $item->name;
        $result["price"] = $item->price;
        $result["isAvailable"] = $item->isAvailable;
        $result["imageURL"] = $item->imageURL;

        $flower = R::load("flower", $item->flower_id);

        $result["flowerName"] = $flower->flowerName;
        array_push($arr, $result);
    }
    response(200, $arr);
}

function response($status, $arrangement) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['arrangement'] = $arrangement;

    $json_response = json_encode($response);
    echo $json_response;
}

//echo calcPrice(1, 2)