<?php

// Author: Johann Lee Jia Xuan
// Implements  Factory pattern

require_once("rb.php");
require_once("XML.php");
require_once("XMLDatabase.php");
require_once("DB.php");

class XMLFactory{
    
    
    public function __construct(){
    }

    public function construct($type, $itemName) {
        if($type == "database"){
            $xml = new XMLDatabase();
            $xml->build($itemName);
            return $xml;
        }
        
        if($type == "regular"){
            $xml = new XMLRegular();
            $xml->build($itemName);
            return $xml;
        }
    }



}
