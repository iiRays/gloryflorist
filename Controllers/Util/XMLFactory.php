<?php

// Author: Johann Lee Jia Xuan
// Implements  Factory pattern

require_once("rb.php");
require_once("XML.php");

class XMLFactory {

    public function createXML($rootName) {
        $xml = new XML();
        $xml->createRoot($rootName);
        return $xml;
    }

}
