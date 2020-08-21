<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->

<?php

require_once ("FloralArrangementInterface.php");
require_once ("FloralArrangement.php");

class FloralArrangementAdapter implements FloralArrangementInterface {

    private $arrangement;

    public function __construct() {
        $this->floral = new FloralArrangement();
    }

    public function getData($id) {
        return $this->floral->getFloralData($id);
    }

    public function getName($id) {
        return $this->floral->getFloralName($id);
    }

    public function getPrice($id) {
        return $this->floral->getFloralPrice($id);
    }

    public function getImgSrc($id) {
        return $this->floral->getFloralImgSrc($id);
    }

    public function getAvailability($id) {
        return $this->floral->getFloralAvailability($id);
    }
    
    public function getFlowerId($id) {
        return $this->floral->getFloralFlowerId($id);
    }
    
    public function getFlowerName($id) {
        return $this->floral->getFloralFlowerName($id);
    }

    public function getStalks($id) {
        return $this->floral->getFloralStalks($id);
    }

    public function editData($id, $name, $price, $stalk, $imgLink, $flowerId) {
        $this->floral->editFloralData($id, $name, $price, $stalk, $imgLink, $flowerId);
    }

    public function editName($id, $name) {
        $this->floral->editFloralName($id, $name);
    }

    public function editPrice($id, $price) {
        $this->floral->editFloralPrice($id, $price);
    }

    public function editImgSrc($id, $imgLink) {
        $this->floral->editFloralImgSrc($id, $imgLink);
    }

    public function editFlower($id, $flowerId) {
        $this->floral->editFloralFlower($id, $flowerId);
    }

    public function editStalks($id, $stalks) {
        $this->floral->editFloralStalks($id, $stalks);
    }

    public function addData($name, $price, $stalk, $imgLink, $flowerId) {
        $this->floral->addFloralData($name, $price, $stalk, $imgLink, $flowerId);
    }

}