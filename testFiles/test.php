<?php
include "../Controllers/Util/rb.php";

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
R::nuke();

$flower = R::dispense("flower");
$flower->flowerName = "Rose";
$flower->price = 12.00;
$flower->description = "Very beautiful";

$flower2 = R::dispense("flower");
$flower2->flowerName = "Lily";
$flower2->price = 12.00;
$flower2->description = "Very beautiful";

$arrangement = R::dispense("arrangement");
$arrangement->name = "Rose Bouquet";
$arrangement->cost = "100";
$arrangement->wrapColor = "red";
$arrangement->flower = $flower;
$arrangement->stalks = 12;

$arrangement2 = R::dispense("arrangement");
$arrangement2->name = "Gay Flowers";
$arrangement2->cost = "130";
$arrangement2->wrapColor = "blue";
$arrangement2->flower = $flower2;
$arrangement2->stalks = 9;
//
//$item = R::dispense("item");
//$item->flower = $flower;
//$item->arrangement = $arrangement;
//$item->quantity = 12;

$order = R::dispense("orders");
$order->grandTotal = 100.00;
$order->deliveryAddress = "Sabah";
$order->status = "pending";
$order->targetDate = date_create("2020-07-28 20:00");


// Each arrangement, 1 order item
$orderItem = R::dispense("orderitem");
$orderItem->arrangement = $arrangement;
$orderItem->order = $order;
$orderItem->quantity = 2;

$orderItem2 = R::dispense("orderitem");
$orderItem2->arrangement = $arrangement2;
$orderItem2->order = $order;
$orderItem2->quantity = 4;

R::storeAll([$flower, $flower2, $arrangement, $arrangement2, $order, $orderItem, $orderItem2]);