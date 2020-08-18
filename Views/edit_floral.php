<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

$id = $_POST['id'];
$name = $_POST['name'];
$stalk = $_POST['stalk'];
$flowerId = $_POST['flowers'];
$price = doubleval($_POST['price']);
$imgLink = $_POST['flowerImgSrc'];

$flower = R::load("flower", $flowerId);
$isAvailable = $flower->isAvailable;

$arrangement = R::load("arrangement", $id);
$arrangement->name = $name;
$arrangement->price = $price;
$arrangement->isAvailable = $isAvailable;
$arrangement->img = $imgLink;
$arrangement->flower_id = $flowerId;
$arrangement->stalks = $stalk;

R::storeAll([$arrangement]);

echo 'Edit Successfully';
?>



