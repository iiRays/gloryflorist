<?php
require_once("XMLInterface.php");

/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class XMLRegular extends XML {

    public function build($rootName) {
        $this->xml->createRoot($this->rootName);
    }

}
