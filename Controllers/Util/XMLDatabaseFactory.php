<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/IFactory.php");
require_once("../Controllers/Util/DB.php");
/**
 * Description of XMLDatabaseFactory
 *
 * @author mast3
 */
class XMLDatabaseFactory implements IFactory{
    
    private $tableName;
    
    public function __construct($tableName){
        $this->tableName = $tableName;
    }
    
    public function build() {
        // Create the XML
        $xml = new XML();
        $xml->createRoot($this->tableName."List");
        DB::connect();
        
        // Root name MUST BE EQUAL to a database table name for this to work
        $result = R::findAll($this->tableName);
        $xml->appendXML($result, $this->tableName);
        
        return $xml;
    }

    // Getters and setters
    
    function getTableName() {
        return $this->tableName;
    }

    function setTableName($tableName) {
        $this->tableName = $tableName;
        return $this;
    }


}
