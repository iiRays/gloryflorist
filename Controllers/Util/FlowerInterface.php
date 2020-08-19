<?php

interface FlowerInterface {

    //get data
    public function getData($id);

    public function getName($id);

    public function getRemarks($id);

    public function getImgSrc($id);

    public function getAvailability($id);

    //edit data
    public function editData($id, $name, $remark, $imgLink, $isAvailable);

    public function editName($id, $name);

    public function editRemarks($id, $remarks);

    public function editImgSrc($id, $imgLink);

    public function editAvailability($id, $isAvailable);

    //add data
    public function addData($name, $remark, $imgLink, $isAvailable);
}
