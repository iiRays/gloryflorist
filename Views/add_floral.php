<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

$name = $_POST['name'];
$stalk = $_POST['stalk'];
$flowerId = $_POST['flowers'];
$price = doubleval($_POST['price']);
$imgLink = $_POST['flowerImgSrc'];

$flowers = R::load("flower", $flowerId);
$isAvailable = $flowers->isAvailable;

$arrangement = R::dispense("arrangement");
$arrangement->name = $name;
$arrangement->price = $price;
$arrangement->isAvailable = $isAvailable;
$arrangement->img = $imgLink;
$arrangement->flower_id = $flowerId;
$arrangement->stalks = $stalk;
R::storeAll([$arrangement]);

echo 'Added Successfully';
?>



