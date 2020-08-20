<?php
/*
 Author: Chong Wei Jie
 ID: 19WMR09574
 * 
 */

require_once 'Flower.php';

class DOMParser {

    private $flowers;

    public function __construct($filename) {
        $this->flowers = new SplObjectStorage();
        $this->readFromXML($filename);
        $this->display();
    }

    public function readFromXML($filename) {
        $xml = simplexml_load_file($filename);
        $flowersList = $xml->flower;

        foreach ($flowersList as $flower) {
            $attr = $flower->attributes();
            $flowerTemp = new Flower($flower->id, $flower->flower_name, $flower->remark, $flower->img, $flower->is_available);
            if($flower->is_available == "true"){
                $flower->is_available = "Yes";
            }else{
                $flower->is_available = "No";
            }

            $this->flowers->attach($flowerTemp);
        }
    }

    public function display() {
        echo '<h2>Flower List </h2>' 
        . '<table border="1" style="text-align:center;"><tr><th>ID</th><th>Image</th><th>Flower name</th><th>Remarks</th><th>Available for floral arrangement</th></tr>';
        foreach ($this->flowers as $flower) {
            print $flower . "<br />";
        }
        echo '</table>';
    }

}

$flower = new DOMParser("Flower.xml");
