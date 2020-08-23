<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLFactory.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/CartItem.php");
require_once("../Controllers/Util/Item.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/Authorize.php");

Authorize::onlyAllow("customer");

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');

// get cart from session
$cartAdapter = Session::get("cartAdapter");

$totalPrice = 0;
$cartItems = [];
foreach ($cartAdapter->getItems() as $item) {
    $price = $item->arrangement->price * $item->quantity;
    $cartItems[] = new CartItem($item->arrangement->name, $item->quantity, $price);
    $totalPrice += $price;
}

$totalPriceArr = []; // lazy coder moment
$totalPriceArr[] = new CartItem("Total price", 1, $totalPrice); // there's only ever gonna be 1 item in totalPriceArr

$xml = new DOMDocument();
$xml->appendChild($xml->createElement("Cart"));
$xmlRoot = $xml->documentElement;


$itemList = $xml->createElement("items");

foreach ($cartItems as $item) {
    // Create item
    $itemNode = $xml->appendChild($xml->createElement("item"));
    
    // Load item name
   $itemName = $xml->createElement("name"); 
   $itemName->appendChild($xml->createTextNode($item->name));   
   $itemNode->appendChild($itemName);

  // Load order quantity
   $itemQuantity = $xml->createElement("quantity"); 
   $itemQuantity->appendChild($xml->createTextNode($item->quantity));   
   $itemNode->appendChild($itemQuantity);
   
   // Load price
   $itemPrice = $xml->createElement("price"); 
   $itemPrice->appendChild($xml->createTextNode($item->price));   
   $itemNode->appendChild($itemPrice);
   
    // Put the item inside tree
    $itemList->appendChild($itemNode);
    $xmlRoot->appendChild($itemList);
}

 // Add a total price 
   $total = $xml->appendChild($xml->createElement("totalPrice"));
   $total->appendChild($xml->createTextNode($totalPrice));   
   $xmlRoot->appendChild($total);

/* Unused
$itemList = $xml->createElement("totalPriceArr"."s");

foreach ($totalPriceArr as $item) {
    // Create a node
    $node = $xml->appendChild($xml->createElement("totalPriceArr"));

    // Each data inside node
    foreach ($item as $key => $value) {

        // Create a String node
        $dataNode = $xml->createElement($key);
        $dataNode->appendChild($xml->createTextNode($value));

        // Add each inner node into the outer node
        $node->appendChild($dataNode);
    }

    // Put the node inside the entire result
    $mainNode->appendChild($node);
    $xmlRoot->appendChild($mainNode);
}*/


// Uncomment when you're ready UWU
 
$xsl = new DOMDocument();
$xsl->load("confirmOrderStyle.xsl");

$xlstProc = new XSLTProcessor();
$xlstProc->importStylesheet($xsl);

echo $xlstProc->transformToXml($xml);

// TO DISPLAY XML TREE:
//header('Content-type:  text/xml');
//echo $xml->saveHTML();