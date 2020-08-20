<?php
/*
 Author: Chong Wei Jie
 ID: 19WMR09574
 * 
 */

class Flower {

    private $id;
    private $flowerName;
    private $remark;
    private $img;
    private $isAvailable;

    function __construct($id, $name, $remark, $img, $isAvailable) {
        $this->id = $id;
        $this->flowerName = $name;
        $this->remark = $remark;
        $this->img = $img;
        $this->isAvailable = $isAvailable;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->flowerName;
    }

    public function getRemark() {
        return $this->remark;
    }

    public function getImg() {
        return $this->img;
    }

    public function getIsAvailable() {
        if ($this->isAvailable == "true") {
            return "Yes";
        } else {
            return "No";
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->flowerName = $name;
    }

    public function setRemark($remark) {
        $this->remark = $remark;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setIsAvailable($isAvailable) {
        if ($isAvailable == "true") {
            $this->isAvailable = "Yes";
        } else {
            $this->isAvailable = "No";
        }
    }

    public function __toString() {
        return   '<tr><td>' . $this->id . '</td>'
                . '<td><img src="' . $this->img . '" style="max-width: 180px;max-height: 180px;display: block;"/></td>'
                . '<td>' . $this->flowerName . '</td>'
                . '<td>' . $this->remark . '</td>'
                . '<td>' . $this->isAvailable . '</td></tr>';
    }

}
