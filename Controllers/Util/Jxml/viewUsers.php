<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("admin");
class viewUsers {
  
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

$worker = new viewUsers("allUser.xml", "allUser.xsl");
?>
