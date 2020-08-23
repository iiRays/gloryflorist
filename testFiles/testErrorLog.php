<?php

//To handle uncaught errors
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';
$logger = new LoggerFactory("UNCAUGHTERROR");
$logger->createLogger()->invalidLogger(null, null);

// Nothing wrong with this 
echo new Gay();

