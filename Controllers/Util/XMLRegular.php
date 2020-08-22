<?php
require_once("XML.php");

/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class XMLRegular extends XML {

    public function build($rootName) {
        $this->xml = new DOMDocument();
        $this->createRoot($rootName);
    }

}
