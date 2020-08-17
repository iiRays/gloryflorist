<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLDatabaseFactory.php");

$factory = new XMLDatabaseFactory();
$xml = $factory->build("user");
$xml->display();