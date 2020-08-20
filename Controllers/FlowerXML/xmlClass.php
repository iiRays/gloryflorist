<?php
/*
 Author: Chong Wei Jie
 ID: 19WMR09574
 * 
 */

include "../Util/rb.php";
include "../Util/DB.php";

Class xmlClass {

    public $xml;

    public function __construct() {
        $this->xml = new XMLWriter();
    }

    public function getData($database) {
        DB::connect();
        return R::findAll($database);
    }

    public function generateXml($database, $xslFile, $dtdFile, $xmlFilename) {

        $this->xml->openMemory();
        $this->xml->startDocument('1.0', 'UTF-8');
        if ($xslFile != null) {
            $this->xml->writePi("xml-stylesheet", "type=\"text/xsl\" href=\"" . $xslFile . "\"");
        }
        if ($dtdFile != null) {
            $this->xml->writeRaw("<!DOCTYPE " . $database . "s SYSTEM '" . $dtdFile . "'>");
        }

        //outer element
        $this->xml->startElement($database . "s");

        $arrayOfData = $this->getData($database);
        if (!empty($arrayOfData)) {
            foreach ($arrayOfData as $items) {
                $getObjectArr[] = $items;
            }
        }

        end($getObjectArr);
        $numOfObject = key($getObjectArr);

        $arr = R::getRow("select * from " . $database);
        $newArr = R::getAll("select * from " . $database);

        foreach ($arr as $item) {
            $dataArrResult[] = $item;
        }

        end($dataArrResult);
        $numOfData = key($dataArrResult);

        foreach ($arr as $item) {
            $getKeyResult[] = $item;
        }
        end($getKeyResult);
        $key2 = key($getKeyResult);

        foreach ($newArr as $k => $v) {
            $x = 0;
            foreach ($arr as $key => $item) {
                $newArr[$k] [$x] = $newArr[$k] [$key];
                unset($newArr[$k][$key]);
                if ($x <= $key2) {
                    $x++;
                } else {
                    break;
                }
            }
        }

        foreach ($arr as $key => $item) {
            $keyName[] = $key;
        }

        for ($x = 0; $x <= $numOfObject; $x++) {
            $this->xml->startElement($database);
            $first = true;
            for ($y = 0; $y <= $numOfData; $y++) {
                $data = $newArr[$x][$y];
                $name = $keyName[$y];
                if ($first) {
                    $this->xml->writeAttribute($name, $data);
                    $first = false;
                }
                $this->xml->startElement($name);
                $this->xml->text($data);
                $this->xml->endElement();
            }
            //close inner element
            $this->xml->endElement();
        }
        //close outer element
        $this->xml->endElement();
        
        $this->xml->endDocument();
        file_put_contents($xmlFilename, $this->xml->outputMemory());
    }

}

$xml = new xmlClass();
$xml->generateXml("flower", "Flower.xsl", "Flower.dtd", "Flower.xml");