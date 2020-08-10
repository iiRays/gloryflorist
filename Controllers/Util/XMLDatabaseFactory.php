<?php

// Author: Johann Lee Jia Xuan
// Implements Singleton AND Factory pattern

require_once("rb.php");
require_once("XML.php");
require_once("XMLFactory.php");

class XMLDatabaseFactory extends XMLFactory{

    private static $converter = null;

    // Private to disable object creation outside of this class
    private function __construct() {
       R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB
    }

    public static function getInstance() {
        if (self::$converter == null) {
            self::$converter = new XMLDatabaseFactory();
        }

        return self::$converter;
    }
    
  
    // Gets all from table
    public function createXMLFromDB($tableName){
        $result = R::findAll($tableName);
        $xml = new XML();
        $xml->loadIntoXML($result, $tableName);
        return $xml;
    }

    // Create XML based on pre-queried result
    public function createXMLFromResult($result, $nodeName) {
        $xml = new XML();
        $xml->loadIntoXML($result, $nodeName);
        return $xml;
    }

}
