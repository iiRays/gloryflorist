<?php

require_once("XML.php");
require_once("rb.php");
/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class XMLDatabase extends XML {
    protected $dataObtained;

    public function build($tableName) {
        $this->createRoot($tableName."List");
        
        DB::connect();
        
        // Root name MUST BE EQUAL to a database table name for this to work
        $result = R::findAll($tableName);
        $this->appendXML($result, $tableName);
        $this->dataObtained = $result;
    }

}
