<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLFactory.php");
require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/Item.php");

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');

// simulate cart in session
$cart = new Cart();
$cart->addItem("1", 3);
$cart->addItem("2", 5);

$factory = new XMLFactory();
$xml = $factory->build("confirmOrder");
$xml->appendXML($cart->items, "items");
echo $xml->styleWith("confirmOrderStyle.xsl");
