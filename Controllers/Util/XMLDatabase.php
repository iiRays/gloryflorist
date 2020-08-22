<?php

/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class XMLDatabase extends XML {

    public function build($tableName) {
        $this->loadData($tableName);
        $this->xml->appendChild($this->xml->createElement($tableName."List"));
        
        DB::connect();
        
        // Root name MUST BE EQUAL to a database table name for this to work
        $result = R::findAll($this->tableName);
        $this->xml->appendXML($result, $this->tableName);
    }

}
