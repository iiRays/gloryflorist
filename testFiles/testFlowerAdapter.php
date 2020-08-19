<?php
include "../Controllers/Util/FlowerAdapter.php";

//$flower = new Flower();
//$flower->setFlowerName("Rose");

$flower = new FlowerAdapter();

$flower->getData(1);
$flower->getName(1);
$flower->getRemarks(1);
$flower->getImgSrc(1);
$flower->getAvailability(1);

/*
$flower->setName("Rose");
echo '<br/>';
$flower->setRemarks("Almost out of stock");
 * 
 */