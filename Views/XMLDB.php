<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLFactory.php");
require_once("../Controllers/Util/DB.php");

DB::connect();

$result = R::find("arrangement", "is_available = ?", ["true"]);
$factory = new XMLFactory("testXML");
$xml = $factory->build();
$xml->appendXML($result, "arrangementList");
$xml->display();