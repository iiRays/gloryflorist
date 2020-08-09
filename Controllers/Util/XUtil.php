<?php

// Author: Johann Lee Jia Xuan
// Implements Singleton pattern

require_once("rb.php");

class XUtil {

    private static $converter = null;

    // Private to disable object creation outside of this class
    private function __construct() {
        R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB
    }

    public static function getInstance() {
        if (self::$converter == null) {
            self::$converter = new XUtil();
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
        return self::convertToXML($result, $type);
    }

    // Accepts a RedBeanPHP result as input and returns an XML design
    public function convertToXML($result, $nodeName) {
        $xml = new DOMDocument();

        //Create the root element
        $xml->appendChild($xml->createElement($nodeName . "s"));
        $xmlRoot = $xml->documentElement;

        // Reference: (Peel 2013) @ https://stackoverflow.com/questions/12576676/converting-mysql-table-data-directly-to-an-xml-in-php

        foreach ($result as $item) {
            // Create a node
            $node = $xml->appendChild($xml->createElement($nodeName));

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


        return $xml;
    }
    
    public function applyStyle($xml, $xslFileName){
        
        //Load XSL file
        $xsl = new DOMDocument();
        $xsl->load($xslFileName);
        
        
        $xlstProc = new XSLTProcessor();
        $xlstProc->importStylesheet($xsl);
        
        return $xlstProc->transformToXml($xml);
    }
    
    public function display($xml){
        header('Content-type:  text/xml');
        echo $xml->saveHTML();
    }

}
