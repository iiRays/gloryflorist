<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XMLRegular.php");
require_once("../Controllers/Util/XMLFactory.php");
require_once("../Controllers/Util/DB.php");

DB::connect();

$result = R::find("arrangement", "is_available = ?", ["true"]);
$factory = new XMLFactory();
$xml = $factory->construct("regular", "arrangementList");
$xml->appendXML($result, "arrangements");
$xml->display();