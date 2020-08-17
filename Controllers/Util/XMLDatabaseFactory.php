<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/XML.php");
require_once("../Controllers/Util/XMLFactoryInterface.php");
require_once("../Controllers/Util/DB.php");
/**
 * Description of XMLDatabaseFactory
 *
 * @author mast3
 */
class XMLDatabaseFactory implements XMLFactoryInterface{
    public function build($tableName) {
        // Create the XML
        $xml = new XML();
        $xml->createRoot($tableName."List");
        
        DB::connect();
        
        // Root name MUST BE EQUAL to a database table name for this to work
        $result = R::findAll($tableName);
        $xml->appendXML($result, $tableName);
        
        return $xml;
    }

}
