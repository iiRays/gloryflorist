<?php

include "../Controllers/Util/XMLDatabaseFactory.php";
require_once("../Controllers/Util/rb.php");



$xml = XMLDatabaseFactory::getInstance()->createXMLFromDB("user");
$xml->display();
