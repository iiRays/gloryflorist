<?php

//include the logger class to log the unhandle error/exception..
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';

$logger = new LoggerFactory("UNCAUGHTERROR");
$logger->createLogger()->invalidLogger(null, null);

//invalid object instantiation
$item = new Gay();
