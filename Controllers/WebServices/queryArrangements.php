<?php

require_once("../Util/Quick.php");
require_once("../Util/rb.php");
require_once("../Util/DB.php");

DB::connect();

header("Content-Type:application/json");

$min = Quick::getGetData("minPrice");
$max = Quick::getGetData("maxPrice");

// Sort through all the optional parameters

if($min && $max){ // If both min and max is given
    $arrangementList = R::find("arrangement", "cost >= ? and cost <= ?", [$min, $max]);
    
} else if($min){ // If only min is given
    $arrangementList = R::find("arrangement", "cost >= ?", [$min]);
    
} else if($max){ // If only max is given
    $arrangementList = R::find("arrangement", "cost <= ?", [$max]);
    
} else{ // No parameter given, find all
    $arrangementList = R::findAll("arrangementList");
}

// Check for null
if(count($arrangementList) == 0){
    response(200, "No results", null);
}else{
    response(200, "Data found", $arrangementList);
}

// Show the JSON response
function response($status, $message, $data){
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;
    
    
    $json = json_encode($response);
    echo $json;
}