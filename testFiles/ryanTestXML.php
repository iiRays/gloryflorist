<?php

include "../Controllers/Util/XMLDatabaseFactory.php";

//$xml = XMLDatabaseFactory::getInstance()->createXMLFromDB("orders");
//$xml->display();
//echo $xml->styleWith("ryanTestXSL.xsl");

$xml = XMLDatabaseFactory::getInstance();

$orders = R::findAll("orders");

foreach ($orders as $order) {
    $id = $order->id;
    $order = R::find("orders", "id = ?", [$id]);
    
    $xml = XMLDatabaseFactory::getInstance()->createXMLFromResult($order, "orders");
    echo $xml->styleWith("ryanTestXSL.xsl");
}