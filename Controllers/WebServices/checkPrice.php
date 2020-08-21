<?php

include "../Util/rb.php";
include "../Util/DB.php";

DB::connect();

header("Content-Type:application/json");

$arrangement = R::find('arrangement', "is_available = ?", ["true"]);
$arr = array();
if (count($arrangement) == 0) {
    response(200, "false", null);
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
/*
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
    $arrangementList = R::findAll("arrangement");
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
 * 
 */

