<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->

<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

class FloralArrangement {

    public $results = array();

    public function __construct() {
        //ntg yet
    }

    public function get($id) {
        DB::connect();
        $arrangement = R::findAll('arrangement');

        foreach ($arrangement as $items) {
            $this->results[] = $items;
        }
        if (!empty($this->results)) {
            return $this->results[$id - 1];
        }
    }

    public function getFloralData($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            echo 'Floral ID: ' . $arrangement->id . '<br/>';
            echo 'Floral Name: ' . $arrangement->name . '<br/>';
            echo 'Price: ' . $arrangement->price . '<br/>';
            echo 'Floral Image Src: ' . $arrangement->imageURL . '<br/>';
            echo 'Flower ID: ' . $arrangement->flower_id . '<br/>';
            echo 'Stalks: ' . $arrangement->stalks . '<br/>';
            echo 'Availability: ' . $arrangement->isAvailable . '<br/>';
        }
    }

    public function getFloralName($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            return $arrangement->name;
        }
    }

    public function getFloralPrice($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            return $arrangement->price;
        }
    }

    public function getFloralImgSrc($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            return $arrangement->imageURL;
        }
    }

    public function getFloralAvailability($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            return $arrangement->isAvailable;
        }
    }

    public function getFloralStalks($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            return $arrangement->stalks;
        }
    }
    
    public function getFloralFlowerId($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            return $arrangement->flower_id;
        }
    }

    public function getFloralFlowerName($id) {
        $arrangement = array();
        $arrangement = $this->get($id);
        if (!empty($arrangement)) {
            $flowerId = $this->getFloralFlowerId($id);
            $flower = R::load("flower", $flowerId);
            return $flower->flowerName;
        }
    }

    public function edit($id) {
        DB::connect();

        $arrangement = R::load("arrangement", $id);
        foreach ($arrangement as $items) {
            $this->results[] = $items;
        }
        return $arrangement;
    }

    public function editFloralData($id, $name, $price, $stalk, $imgLink, $flowerId) {
        $arrangement = array();
        $arrangement = $this->edit($id);
        if (!empty($arrangement)) {
            $arrangement->name = $name;
            $arrangement->price = $price;
            $arrangement->imageURL = $imgLink;
            $arrangement->flower_id = $flowerId;
            $flower = R::load("flower", $flowerId);
            $arrangement->isAvailable = $flower->isAvailable;
            $arrangement->stalks = $stalk;
            R::storeAll([$arrangement]);
        }
    }

    public function editFloralName($id, $name) {
        $arrangement = array();
        $arrangement = $this->edit($id);
        if (!empty($arrangement)) {
            $arrangement->name = $name;
            R::storeAll([$arrangement]);
        }
    }

    public function editFloralPrice($id, $price) {
        $arrangement = array();
        $arrangement = $this->edit($id);
        if (!empty($arrangement)) {
            $arrangement->price = $price;
            R::storeAll([$arrangement]);
        }
    }

    public function editFloralImgSrc($id, $imgLink) {
        $arrangement = array();
        $arrangement = $this->edit($id);
        if (!empty($arrangement)) {
            $arrangement->imageURL = $imgLink;
            R::storeAll([$arrangement]);
        }
    }

    public function editFloralStalks($id, $stalks) {
        $arrangement = array();
        $arrangement = $this->edit($id);
        if (!empty($arrangement)) {
            $arrangement->stalks = $stalks;
            R::storeAll([$arrangement]);
        }
    }

    public function editFloralFlower($id, $flowerId) {
        $arrangement = array();
        $arrangement = $this->edit($id);
        if (!empty($arrangement)) {
            $arrangement->flower_id = $flowerId;
            $flower = R::load("flower", $flowerId);
            $arrangement->isAvailable = $flower->isAvailable;
            R::storeAll([$arrangement]);
        }
    }

    public function add() {
        DB::connect();
        return R::dispense("arrangement");
    }

    public function addFloralData($name, $price, $stalk, $imgLink, $flowerId) {
        $arrangement = array();
        $arrangement = $this->add();

        $arrangement->name = $name;
        $arrangement->price = $price;
        $arrangement->imageURL = $imgLink;
        $arrangement->flower_id = $flowerId;
        $flower = R::load("flower", $flowerId);
        $arrangement->isAvailable = $flower->isAvailable;
        $arrangement->stalks = $stalk;
        R::storeAll([$arrangement]);
    }

}