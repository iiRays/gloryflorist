<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->

<?php

include "FlowerInterface.php";
include "Flower.php";

class FlowerAdapter implements FlowerInterface {

    private $flower;

    public function __construct() {
        $this->flower = new Flower();
    }

    public function getData($id) {
        return $this->flower->getFlowerData($id);
    }

    public function getName($id) {
        return $this->flower->getFlowerName($id);
    }

    public function getRemarks($id) {
        return $this->flower->getFlowerRemarks($id);
    }

    public function getImgSrc($id) {
        return $this->flower->getFlowerImgSrc($id);
    }

    public function getAvailability($id) {
        return $this->flower->getFlowerAvailability($id);
    }

    public function editData($id, $name, $remark, $imgLink, $isAvailable) {
        $this->flower->editFlowerData($id, $name, $remark, $imgLink, $isAvailable);
    }

    public function editName($id, $name) {
        $this->flower->editFlowerName($id, $name);
    }

    public function editRemarks($id, $remarks) {
        $this->flower->editFlowerRemarks($id, $remarks);
    }

    public function editImgSrc($id, $imgLink) {
        $this->flower->editFlowerImgSrc($id, $imgLink);
    }

    public function editAvailability($id, $isAvailable) {
        $this->flower->editFlowerAvailability($id, $isAvailable);
    }

    public function addData($name, $remark, $imgLink, $isAvailable) {
        $this->flower->addFlowerData($name, $remark, $imgLink, $isAvailable);
    }

    /*
      public function setName($name) {
      $this->flower->setFlowerName($name);
      }

      public function setRemarks($remarks) {
      $this->flower->setFlowerRemarks($remarks);
      }
     * 
     */
}
