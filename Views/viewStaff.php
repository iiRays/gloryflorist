<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("admin");

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLFactory.php");

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB

$staffList = R::find("user","role = ?", ["staff"]);
$changelog = R::findAll("changelog", "order by id desc limit 3");
$changelog = array_reverse($changelog);

$factory = new XMLFactory();
$xml = $factory->build("viewStaff");
$xml->appendXML($staffList, "staff");
$xml->appendXML($changelog, "changelog");
echo $xml->styleWith("staffMemberStyle.xsl");

