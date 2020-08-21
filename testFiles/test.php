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
$flower->remark = "Very beautiful";
$flower->imageURL = "https://i.imgur.com/yd4JiYF.png";
$flower->isAvailable = "true";

$flower2 = R::dispense("flower");
$flower2->flowerName = "Lily";
$flower2->remark = "Very beautiful";
$flower2->imageURL = "https://i.imgur.com/yd4JiYF.png";
$flower2->isAvailable = "false";

$arrangement = R::dispense("arrangement");
$arrangement->name = "Rose Bouquet";
$arrangement->price = "100";
$arrangement->isAvailable = "true";
$arrangement->imageURL = "https://i.imgur.com/yd4JiYF.png";
$arrangement->flower = $flower;
$arrangement->stalks = 12;

$arrangement2 = R::dispense("arrangement");
$arrangement2->name = "Gay Flowers";
$arrangement2->price = "130";
$arrangement2->isAvailable = "false";
$arrangement2->imageURL = "https://i.imgur.com/yd4JiYF.png";
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

//Admin
$user = R::dispense("user");
$user->email="johannljx@gmail.com";
$user->password="$2y$10$9.xw.GaAybqd06T/CT8WYudE3oieVNJV.P3v02uNaUqG5ci8z/wKq"; // password = 123
$user->name="Johann";
$user->role="admin";
$user->status="active";
$user->phone = "0123456789";
$user->address = "Buckingham Palace, Sabah";
$user->attempt = 0;

R::store($user);

R::storeAll([$flower, $flower2, $arrangement, $arrangement2, $order, $orderItem, $orderItem2]);