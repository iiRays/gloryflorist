<?php

class XSLTTransformation {
  
  public function __construct($xmlfilename, $xslfilename) {
    $xml = new DOMDocument();
    $xml->load($xmlfilename);
    
    $xsl = new DOMDocument();
    $xsl->load($xslfilename);
    
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    echo $proc->transformToXml($xml);
  }
}

$worker = new XSLTTransformation("catalog.xml", "cdOut1.xsl");
$worker = new XSLTTransformation("catalog.xml", "cdOut2.xsl");
$worker = new XSLTTransformation("catalog.xml", "cdOut3.xsl");
?>
