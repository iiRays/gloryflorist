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
$cart = Session::get("cart");

$totalPrice = 0;
$cartItems = [];
foreach ($cart->items as $item) {
    $price = $item->arrangement->price * $item->quantity;
    $cartItems[] = new CartItem($item->arrangement->name, $item->quantity, $price);
    $totalPrice += $price;
}

$totalPriceArr = []; // lazy coder moment
$totalPriceArr[] = new CartItem("Total price", 1, $totalPrice); // there's only ever gonna be 1 item in totalPriceArr

$xml = new DOMDocument();
$xmlRoot = $xml->documentElement;
$xml->appendChild($xml->createElement("confirmOrder"));

/*$mainNode = $xml->createElement("items"."s");

foreach ($cartItems as $item) {
    // Create a node
    $node = $xml->appendChild($xml->createElement("items"));

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
}

$mainNode = $xml->createElement("totalPriceArr"."s");

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

$xsl = new DOMDocument();
$xsl->load("confirmOrderStyle.xsl");

$xlstProc = new XSLTProcessor();
$xlstProc->importStylesheet($xsl);

echo $xlstProc->transformToXml($xml);