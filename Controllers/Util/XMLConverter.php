<?php

// Author: Johann Lee Jia Xuan
// Implements Singleton pattern

require_once("rb.php");

class XMLConverter {

    private static $converter = null;

    // Private to disable object creation outside of this class
    private function __construct() {
        R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB
    }

    public static function getInstance() {
        if (self::$converter == null) {
            self::$converter = new XMLConverter();
        }

        return self::$converter;
    }

    // Get all items
    public function getAll($type) {

        // Get data
        $result = R::findAll($type);

        if (!$result) {
            return null;
        }
        
        //Perform conversion
        return self::convertToXML($result);
    }

    // Accepts a RedBeanPHP result as input and returns an XML design
    public function convertToXML($result) {
        $xml = new DOMDocument();

        //Create the root element
        $xml->appendChild($xml->createElement('testResults'));
        $xmlRoot = $xml->documentElement;

        // Reference: (Peel 2013) @ https://stackoverflow.com/questions/12576676/converting-mysql-table-data-directly-to-an-xml-in-php

        foreach ($result as $item) {
            // Create a node
            $node = $xml->appendChild($xml->createElement('flower'));

            // Each data inside flower
            foreach ($item as $key => $value) {

                // Create a String node
                $dataNode = $xml->createElement($key);
                $dataNode->appendChild($xml->createTextNode($value));

                // Add each inner node into the outer node
                $node->appendChild($dataNode);
            }


            // Put the flower inside the entire result
            $xmlRoot->appendChild($node);
        }


        return $xml->saveXML();
    }

}
