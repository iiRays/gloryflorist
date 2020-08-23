<?php
//To handle uncaught errors
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';
$logger = new LoggerFactory("UNCAUGHTERROR");
$logger->createLogger()->invalidLogger(null, null);

require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("admin");

require_once("../Controllers/Util/rba.php");
require_once("../Controllers/Util/DBa.php");
require_once("../Controllers/Util/XMLDatabase.php");
require_once("../Controllers/Util/XMLFactory.php");

DB::connect();

$factory = new XMLFactory();

// Fetch all users; we will filter staff using XPATH later
$xml = $factory->construct("database", "user");

// Get staff changelog
$changelog = R::findAll("changelog", "order by id desc limit 3");
$changelog = array_reverse($changelog);

$xml->appendXML($changelog, "changelog");
echo $xml->styleWith("staffMemberStyle.xsl");


