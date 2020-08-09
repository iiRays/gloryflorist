<?php

include "../Controllers/Util/XUtil.php";

 $converter = XUtil::getInstance();
 $xml = $converter->getAll("flower");
echo $converter->applyStyle($xml, "testXSL.xsl");
