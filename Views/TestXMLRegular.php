<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XMLRegular.php");
require_once("../Controllers/Util/XMLFactory.php");
require_once("../Controllers/Util/DB.php");

DB::connect();

// Constructing the XML
$factory = new XMLFactory();
$xml = $factory->construct("regular", "arrangementList");

// Loading data into XML
$result = R::find("arrangement", "is_available = ?", ["true"]);
$xml->appendXML($result, "arrangements");

// Display XML
$xml->display();