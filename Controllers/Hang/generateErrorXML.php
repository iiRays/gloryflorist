<?php

/*
  Author: kelvin tham yit hang
 */
require_once("rb.php");
require_once("DB.php");

DB::connect();

$errorsArray = R::getAll('select * from errors');

createXMLfile($errorsArray);
foreach ($errorsArray as $result) {
    echo $result['error_string'], '<br>';
}

function createXMLfile($errorsArray) {

    $filePath = 'errorsList.xml';
    $dom = new DOMDocument('1.0', 'utf-8');
    $root = $dom->createElement('errors');
    for ($i = 0; $i < count($errorsArray); $i++) {


        $Id = $errorsArray[$i]['id'];
        $Type = $errorsArray[$i]['error_type'];
        $Time = $errorsArray[$i]['error_time'];
        $String = $errorsArray[$i]['error_string'];
        $File = $errorsArray[$i]['error_file'];
        $Line = $errorsArray[$i]['error_line'];



        $error = $dom->createElement('error');
        $error->setAttribute('Id', $Id);
        
        $type = $dom->createElement('type', $Type);
        $error->appendChild($type);

        $time = $dom->createElement('time', $Time);
        $error->appendChild($time);

        $string = $dom->createElement('string', $String);
        $error->appendChild($string);

        $file = $dom->createElement('file', $File);
        $error->appendChild($file);

        $root->appendChild($error);
    }
    $dom->appendChild($root);
    $dom->save($filePath);
}
