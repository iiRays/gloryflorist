<?php

/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class XML {
    private $xml;
    private $xmlRoot;
    
    public function __construct(){
         $this->xml = new DOMDocument();
    }
    
    public function appendXML($result, $nodeName){
         //Create the root element
        $xml = $this->xml;
        $xmlRoot = $xml->documentElement;

        // Reference: (Peel 2013) @ https://stackoverflow.com/questions/12576676/converting-mysql-table-data-directly-to-an-xml-in-php
        
        $mainNode = $xml->createElement($nodeName."s");

        foreach ($result as $item) {
            
            // Create a node
            $node = $xml->appendChild($xml->createElement($nodeName));

            // Each data inside node
            foreach ($item as $key => $value) {

                // Create a String node
                $dataNode = $xml->createElement($key);
                $dataNode->appendChild($xml->createTextNode($value));

                // Add each inner node into the outer node
                $node->appendChild($dataNode);
            }


            // Put the node inside the entire result
            $mainNode->appendChild($node);
            $xmlRoot->appendChild($mainNode);
        }


        $this->xml = $xml;
    }
    
    
    public function createRoot($rootName){
        $xml = new DOMDocument();
        $xmlRoot = $xml->documentElement;
        
        $xml->appendChild($xml->createElement($rootName));
        $this->xmlRoot = $xmlRoot;
        $this->xml = $xml;
    }
    
    
    
    public function styleWith($xslFileName){
        
        //Load XSL file
        $xsl = new DOMDocument();
        $xsl->load($xslFileName);
        
        
        $xlstProc = new XSLTProcessor();
        $xlstProc->importStylesheet($xsl);
        
        return $xlstProc->transformToXml($this->xml);
    }
    
    public function display(){
        header('Content-type:  text/xml');
        echo $this->xml->saveHTML();
    }
    
    function getXml() {
        return $this->xml;
    }

    
  
}
