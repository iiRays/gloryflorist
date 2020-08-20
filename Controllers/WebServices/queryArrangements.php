<?php

require_once("../Util/Quick.php");
require_once("../Util/rb.php");
require_once("../Util/DB.php");

DB::connect();

header("Content-Type:application/json");

$min = Quick::getGetData("minPrice");
$max = Quick::getGetData("maxPrice");

// Sort through all the optional parameters

if ($min && $max) { // If both min and max is given
    $arrangementList = R::find("arrangement", "price >= ? and price <= ? and is_available = ?", [$min, $max, "true"]);
} else if ($min) { // If only min is given
    $arrangementList = R::find("arrangement", "price >= ? and is_available = ?", [$min, "true"]);
} else if ($max) { // If only max is given
    $arrangementList = R::find("arrangement", "price <= ? and is_available = ?", [$max, "true"]);
} else { // No parameter given, find all
    $arrangementList = R::findAll("arrangementList");
}



// Check for null
if (count($arrangementList) == 0) {
    response(200, "No results", null);
} else {
    
    // Result
    $result = array();
    // Load the flowers related to each arrangement
    foreach ($arrangementList as $arrangement) {
        $resultItem = array();
        
        $resultItem["name"] = $arrangement->name;
        $resultItem["price"] = $arrangement->price;
        $resultItem["img"] = $arrangement->img;
        $resultItem["stalks"] = $arrangement->stalks;
        
        // Get the flower item
        $flower = $arrangement->flower;
        $flowerResult = array();
        $flowerResult["flowerName"] = $flower->flowerName;
        $flowerResult["img"] = $flower->img;
        
        $resultItem["flower"] = $flowerResult;
        
        array_push($result, $resultItem);
    }

    response(200, "Data found", $result);
}

// Show the JSON response
function response($status, $message, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;


    $json = json_encode($response);
    echo $json;
}
