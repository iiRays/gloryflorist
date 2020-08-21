<?php

// Author: Johann Lee Jia Xuan
// Implements  Factory pattern

require_once("rb.php");
require_once("XML.php");
require_once("DB.php");
require_once("IFactory.php");

class XMLFactory implements IFactory{
    
    private $rootName;
    
    public function __construct($rootName){
      $this->rootName = $rootName;  
    }

    public function build() {
        // Create the XML
        $xml = new XML();
        $xml->createRoot($this->rootName);
        return $xml;
    }

    // Setters and getters
    
    function getRootName() {
        return $this->rootName;
    }

    function setRootName($rootName) {
        $this->rootName = $rootName;
        return $this;
    }



}
