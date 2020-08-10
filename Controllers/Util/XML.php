<?php

/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class XML {
    private $xml;
    
    public function __construct(){
         $this->xml = new DOMDocument();
    }

    // Accepts a RedBeanPHP result as input and stores the XML design
    public function loadIntoXML($result, $nodeName) {
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
