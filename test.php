<?php
include "Controllers/Util/DB.php";
include "Controllers/Util/rb.php";

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB
//$flower = R::find("flower", "flower_id = ?", ['TEST']);

//$flower = R::load('flower', 'F01');
//echo $flower;



/*$num = R::count('flower');
$flower = R::load('flower', 1);
//$flowers = R::find('flower',' flowerID = ? ', ['F01']);
echo $num . "<br>";
echo var_dump($flower);
echo $flower->flowerID;*/

$flower = R::dispense('flower');
$flower->flowerID = 'F01';
$flower->flowerType = 'Stalk';
$flower->flowerName = 'Rose';
$flower->description = 'Very nice flower';
$flower->price = 15.00;
R::store($flower);

