<?php

//include the logger class to log the unhandle error/exception..
echo __DIR__;
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';

$logger = new LoggerFactory("UNCAUGHTERROR");

//require_once __DIR__ . '..\Controllers\Security.php';
$item = new Gay();
