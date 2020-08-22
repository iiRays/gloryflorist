<?php

//include "../Controllers/util/logging_error.php";

class XSLTTransformation {

    public function __construct($xmlfilename, $xslfilename) {

        function getSpecifiedDate() {
            return Quick::getPostData("date");
        }

        function getStartDate() {
            return Quick::getPostData("start");
        }

        function getEndDate() {
            return Quick::getPostData("end");
        }

        $xml = new DOMDocument();
        $xml->load($xmlfilename);

        $xsl = new DOMDocument();
        $xsl->load($xslfilename);

        $proc = new XSLTProcessor();
        $proc->registerPHPFunctions();
        $proc->importStylesheet($xsl);
        echo $proc->transformToXml($xml);
    }

}

?>
