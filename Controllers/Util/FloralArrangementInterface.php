<?php

interface FloralArrangementInterface {

    //get data
    public function getData($id);

    public function getName($id);

    public function getPrice($id);

    public function getImgSrc($id);

    public function getAvailability($id);
    
    public function getStalks($id);
    
    public function getFlowerName($id);
    
    public function getFlowerId($id);

    //edit data
    public function editData($id, $name, $price, $stalk, $imgLink, $flowerId);

    public function editName($id, $name);

    public function editPrice($id, $price);

    public function editImgSrc($id, $imgLink);

    public function editStalks($id, $stalks);

    public function editFlower($id, $flowerId);

    //add data
    public function addData($name, $price, $stalk, $imgLink, $flowerId);
}
