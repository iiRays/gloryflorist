<?php

// Author: Johann Lee Jia Xuan
// Implements  Factory pattern

require_once("rb.php");
require_once("XML.php");
require_once("DB.php");

class XMLFactory {

    public function build($rootName) {
        // Create the XML
        $xml = $this->buildXML($rootName);

        return $xml;
    }

    public function buildFromDatabase($tableName) {
        // Create the XML
        $xml = $this->buildXML($tableName."List"); // Root node will be eg. userList
        
        DB::connect();
        
        // Root name MUST BE EQUAL to a database table name for this to work
        $result = R::findAll($tableName);
        $xml->appendXML($result, $tableName);
        
        return $xml;
    }
    
    private function buildXML($rootName){
        $xml = new XML();
        $xml->createRoot($rootName);
        return $xml;
    }

}
