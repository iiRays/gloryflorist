<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("admin");

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLDatabaseFactory.php");

DB::connect();

// Get all users
$changelog = R::findAll("changelog", "order by id desc limit 3");
$changelog = array_reverse($changelog);

$factory = new XMlDatabaseFactory();

// Fetch all users; we will filter staff using XPATH later
$xml = $factory->build("user"); 

$xml->appendXML($changelog, "changelog");
echo $xml->styleWith("staffMemberStyle.xsl");

