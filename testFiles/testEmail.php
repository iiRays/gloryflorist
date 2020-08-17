<?php

require_once("../Controllers/Util/Email.php");
echo Email::send("johannljx@gmail.com", "Testing header", "<h1>WELCOME</h1>");

