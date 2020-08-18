<?php

require_once("../Controllers/Util/Email.php");
require_once("../Controllers/Util/EmailFactory.php");
require_once("../Controllers/Util/Quick.php");

$factory = new EmailFactory();
$email = $factory->build();
$email->send("iiraysmc@outlook.com", "I love you", "JK LOL");
