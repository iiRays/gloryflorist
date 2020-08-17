<?php

include "../Controllers/Util/rb.php";

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = doubleval($_POST['price']);

$flower = R::dispense("flower");
$flower->flowerName = $name;
$flower->price = $price;
$flower->description = $desc;
R::storeAll([$flower]);
?>



