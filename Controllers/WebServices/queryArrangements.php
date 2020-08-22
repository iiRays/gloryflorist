<?php

// Author: JOHANN LEE JIA XUAN
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
    
    $arrangementList = R::find("arrangement", "is_available = ?", ["true"]);
}



// Check for null
if (count($arrangementList) == 0) {
    response(200, "false", null);
} else {
   
    // Result
    $result = array();
    // Load the flowers related to each arrangement
    foreach ($arrangementList as $arrangement) {
        $resultItem = array();
        
      
        $resultItem["id"] = $arrangement->id;
        $resultItem["name"] = $arrangement->name;
        $resultItem["price"] = $arrangement->price;
        $resultItem["img"] = $arrangement->image_url;
        $resultItem["stalks"] = $arrangement->stalks;
        
        // Get the flower item
        $flower = $arrangement->flower;
        $flowerResult = array();
        $flowerResult["flowerName"] = $flower->flowerName;
        $flowerResult["img"] = $flower->image_url;
        
        $resultItem["flower"] = $flowerResult;
        
        array_push($result, $resultItem);
    }

    response(200, "true", $result);
}

// Show the JSON response
function response($status, $hasData, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['hasData'] = $hasData;
    $response['data'] = $data;


    $json = json_encode($response);
    echo $json;
}
