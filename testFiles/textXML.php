<?php

include "../Controllers/Util/XMLConverter.php";

// Obtain data
 header('Content-type:  text/xml');
echo XMLConverter::getInstance()->getAll("flower");
