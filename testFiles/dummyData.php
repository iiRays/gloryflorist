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
$flower->flowerName = "Red Rose";
$flower->remark = "Hot product";
$flower->imageURL = "https://i.imgur.com/NCrFi37.jpg";
$flower->isAvailable = "true";

$flower2 = R::dispense("flower");
$flower2->flowerName = "Pink Lily";
$flower2->remark = "Hot product";
$flower2->imageURL = "https://i.imgur.com/TznGR0m.jpg";
$flower2->isAvailable = "true";

$flower3 = R::dispense("flower");
$flower3->flowerName = "Pink Rose";
$flower3->remark = "Almost out of stocks";
$flower3->imageURL = "https://i.imgur.com/XWRSfy9.jpg";
$flower3->isAvailable = "true";

$flower4 = R::dispense("flower");
$flower4->flowerName = "Sunflower";
$flower4->remark = "Out of stocks";
$flower4->imageURL = "https://i.imgur.com/7L0BHFj.jpg";
$flower4->isAvailable = "false";


$arrangement = R::dispense("arrangement");
$arrangement->name = "99 Red Rose Bouquet";
$arrangement->price = "499";
$arrangement->isAvailable = "true";
$arrangement->imageURL = "https://i.imgur.com/QbDqaGn.jpg";
$arrangement->flower = $flower;
$arrangement->stalks = 99;

$arrangement2 = R::dispense("arrangement");
$arrangement2->name = "Single Sunflower";
$arrangement2->price = "18";
$arrangement2->isAvailable = "false";
$arrangement2->imageURL = "https://i.imgur.com/9bqY5ff.jpg";
$arrangement2->flower = $flower4;
$arrangement2->stalks = 1;

$arrangement3 = R::dispense("arrangement");
$arrangement3->name = "Pink Lily Bouquet";
$arrangement3->price = "136";
$arrangement3->isAvailable = "true";
$arrangement3->imageURL = "https://i.imgur.com/KUrj15Z.jpg";
$arrangement3->flower = $flower2;
$arrangement3->stalks = 8;

$arrangement4 = R::dispense("arrangement");
$arrangement4->name = "50 Red Rose Bouquet";
$arrangement4->price = "269";
$arrangement4->isAvailable = "true";
$arrangement4->imageURL = "https://i.imgur.com/sHekq2d.jpg";
$arrangement4->flower = $flower;
$arrangement4->stalks = 50;

$arrangement5 = R::dispense("arrangement");
$arrangement5->name = "101 Pink Rose Bouquet";
$arrangement5->price = "488";
$arrangement5->isAvailable = "true";
$arrangement5->imageURL = "https://i.imgur.com/BxXy8aY.jpg";
$arrangement5->flower = $flower3;
$arrangement5->stalks = 101;
//
//$item = R::dispense("item");
//$item->flower = $flower;
//$item->arrangement = $arrangement;
//$item->quantity = 12;

$order = R::dispense("orders");
$order->customerId = "1";
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
$orderItem2->arrangement = $arrangement3;
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

R::storeAll([$flower, $flower2, $flower3, $flower4, $arrangement, $arrangement2, $arrangement3, $arrangement4, $arrangement5, $order, $orderItem, $orderItem2]);