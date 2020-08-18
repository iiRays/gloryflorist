<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

$name = $_POST['name'];
$remark = $_POST['remark'];
$imgLink = $_POST['flowerImgSrc'];

if(!empty($_POST['isAvailable'])){
    $isAvailable = "true";
}else{
    $isAvailable = "false";
}

$flower = R::dispense("flower");
$flower->flowerName = $name;
$flower->remark = $remark;
$flower->img = $imgLink;
$flower->isAvailable = $isAvailable;
R::storeAll([$flower]);

echo 'Added Successfully';
?>



