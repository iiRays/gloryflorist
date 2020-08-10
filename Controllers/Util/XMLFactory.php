<?php

// Author: Johann Lee Jia Xuan
// Implements  Factory pattern

require_once("rb.php");
require_once("XML.php");

class XMLFactory {
    
    public function createXML($data, $nodeName){
        $xml = new XML();
        $xml->loadIntoXML($data, $nodeName);
        return $xml;
    }

    

}
