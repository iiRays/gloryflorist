<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
