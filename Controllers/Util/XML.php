<?php

/**
 *
 * @author Johann Lee Jia Xuan
 */
abstract class XML {

    protected $xml;

    public abstract function build($itemName);

    public function createRoot($rootName) {
        $xml = new DOMDocument();

        $xml->appendChild($xml->createElement($rootName));
        $this->xml = $xml;
    }

    public function appendXML($data, $nodeName) {
        //Create the root element
        $xml = $this->xml;
        $xmlRoot = $xml->documentElement;

        // Reference: (Peel 2013)
        // https://stackoverflow.com/questions/12576676/converting-mysql-table-data-directly-to-an-xml-in-php

        $mainNode = $xml->createElement($nodeName . "s");

        foreach ($data as $item) {

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

    public function styleWith($xslFileName) {

        //Load XSL file
        $xsl = new DOMDocument();
        $xsl->load($xslFileName);


        $xlstProc = new XSLTProcessor();
        $xlstProc->importStylesheet($xsl);

        return $xlstProc->transformToXml($this->xml);
    }

    public function display() {
        header('Content-type:  text/xml');
        echo $this->xml->saveHTML();
    }

    // Getter and setter

    function getXml() {
        return $this->xml;
    }

    function setXml($xml) {
        $this->xml = $xml;
        return $this;
    }

}
