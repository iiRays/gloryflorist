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

    public function construct($isDatabase, $data) {
        if($isDatabase){
            $xml = new XMLDatabase();
            $xml->build($data);
            return $xml;
        }
        
        if(!$isDatabase){
            $xml = new XMLRegular();
            $xml->build($data);
            return $xml;
        }
    }



}
