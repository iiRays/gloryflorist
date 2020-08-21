<?php

/*
  Author: Chong Wei Jie
  ID: 19WMR09574
 * 
 */

require_once ('Flower.php');
require_once ('xmlClass.php');

class DOMParser {

    private $flowers;
    private $xlstProc;

    public function __construct($xmlFile, $xslFile) {
        $this->xlstProc = new XSLTProcessor();
        $this->flowers = new SplObjectStorage();
        $this->readFromXML($xmlFile);
        $this->display($xmlFile, $xslFile);
    }

    public function readFromXML($xmlFile) {
        $xml = simplexml_load_file($xmlFile);
        $flowersList = $xml->flower;

        foreach ($flowersList as $flower) {
            $attr = $flower->attributes();
            $flowerTemp = new Flower($flower->id, $flower->flower_name, $flower->remark, $flower->img, $flower->is_available);
            if ($flower->is_available == "true") {
                $flower->is_available = "Yes";
            } else {
                $flower->is_available = "No";
            }

            $this->flowers->attach($flowerTemp);
        }
    }

    public function display($xmlFile, $xslFile) {
        $proc = new XsltProcessor;
        $proc->importStylesheet(DOMDocument::load($xslFile)); //load XSL script
        echo $proc->transformToXML(DOMDocument::load($xmlFile));
        /*
          echo '<h2>Flower List </h2>'
          . '<table border="1" style="text-align:center;"><tr><th>ID</th><th>Image</th><th>Flower name</th><th>Remarks</th><th>Available for floral arrangement</th></tr>';
          foreach ($this->flowers as $flower) {
          print $flower . "<br />";
          }
          echo '</table>';
         * 
         */
    }

}

$xml = new xmlClass();
$xml->generateXml("flower", "Flower.xsl", "Flower.dtd", "Flower.xml");

$flower = new DOMParser("Flower.xml", "Flower.xsl");

