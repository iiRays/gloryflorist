<?php

// Author: Johann Lee Jia Xuan
// Implements  Factory pattern

require_once("rb.php");
require_once("XML.php");
require_once("DB.php");
require_once("XMLFactoryInterface.php");

class XMLFactory implements XMLFactoryInterface{

    public function build($rootName) {
        // Create the XML
        $xml = new XML();
        $xml->createRoot($rootName);
        return $xml;
    }


}
