<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->

<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

class Flower {

    public $results = array();

    public function __construct() {
        //ntg yet
    }

    public function get($id) {
        DB::connect();
        $flower = R::findAll('flower');

        foreach ($flower as $items) {
            $this->results[] = $items;
        }
        if (!empty($this->results)) {
            return $this->results[$id - 1];
        }
    }

    public function getFlowerData($id) {
        $flower = array();
        $flower = $this->get($id);
        if (!empty($flower)) {
            echo 'Flower ID: ' . $flower->id . '<br/>';
            echo 'Flower Name: ' . $flower->flowerName . '<br/>';
            echo 'Remarks: ' . $flower->remark . '<br/>';
            echo 'Flower Image Src: ' . $flower->imageURL . '<br/>';
            echo 'Availability: ' . $flower->isAvailable . '<br/>';
        }
    }

    public function getFlowerName($id) {
        $flower = array();
        $flower = $this->get($id);
        if (!empty($flower)) {
            return $flower->flowerName;
        }
    }

    public function getFlowerRemarks($id) {
        $flower = array();
        $flower = $this->get($id);
        if (!empty($flower)) {
            return $flower->remark;
        }
    }

    public function getFlowerImgSrc($id) {
        $flower = array();
        $flower = $this->get($id);
        if (!empty($flower)) {
            return $flower->imageURL;
        }
    }

    public function getFlowerAvailability($id) {
        $flower = array();
        $flower = $this->get($id);
        if (!empty($flower)) {
            return $flower->isAvailable;
        }
    }

    public function edit($id) {
        DB::connect();

        $flower = R::load("flower", $id);
        foreach ($flower as $items) {
            $this->results[] = $items;
        }
        return $flower;
    }

    public function editFlowerData($id, $name, $remark, $imgLink, $isAvailable) {
        $flower = array();
        $flower = $this->edit($id);
        if (!empty($flower)) {
            $flower->flowerName = $name;
            $flower->remark = $remark;
            $flower->imageURL = $imgLink;
            $flower->isAvailable = $isAvailable;
            R::storeAll([$flower]);
        }
    }

    public function editFlowerName($id, $name) {
        $flower = array();
        $flower = $this->edit($id);
        if (!empty($flower)) {
            $flower->flowerName = $name;
            R::storeAll([$flower]);
        }
    }

    public function editFlowerRemarks($id, $remark) {
        $flower = array();
        $flower = $this->edit($id);
        if (!empty($flower)) {
            $flower->remark = $remark;
            R::storeAll([$flower]);
        }
    }

    public function editFlowerImgSrc($id, $imgLink) {
        $flower = array();
        $flower = $this->edit($id);
        if (!empty($flower)) {
            $flower->imageURL = $imgLink;
            R::storeAll([$flower]);
        }
    }

    public function editFlowerAvailability($id, $isAvailable) {

        $flower = array();
        $flower = $this->edit($id);
        if (!empty($flower)) {
            $flower->isAvailable = $isAvailable;
        }
        R::storeAll([$flower]);

        $arrangement = R::findAll('arrangement');

        $results = array();

        foreach ($arrangement as $items) {
            if ($id == $items->flower_id) {
                $results[] = $items;
            }
        }

        end($results);
        $key = key($results);
        if (!empty($results)) {
            for ($x = 0; $x <= $key; $x++) {
                $arrangement = $results[$x];
                $arrangement->isAvailable = $isAvailable;
                R::storeAll([$arrangement]);
            }
        }
    }

    public function add() {
        DB::connect();
        return R::dispense("flower");
    }
    
    public function addFlowerData($name, $remark, $imgLink, $isAvailable) {
        $flower = array();
        $flower = $this->add();
        
        $flower->flowerName = $name;
        $flower->remark = $remark;
        $flower->imageURL = $imgLink;
        $flower->isAvailable = $isAvailable;
        R::storeAll([$flower]);
    }

}