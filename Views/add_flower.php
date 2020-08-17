<?php

include "../Controllers/Util/rb.php";

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = doubleval($_POST['price']);
$imgLink = $_POST['flowerImgSrc'];

if(!empty($_POST['isAvailable'])){
    $isAvailable = "true";
}else{
    $isAvailable = "false";
}

$flower = R::dispense("flower");
$flower->flowerName = $name;
$flower->price = $price;
$flower->description = $desc;
$flower->img = $imgLink;
$flower->isAvailable = $isAvailable;
R::storeAll([$flower]);
?>



