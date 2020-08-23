<?php

require_once "../Controllers/Util/rb.php";
require_once "../Controllers/Util/DB.php";

DB::connect();
//$flower = R::find("flower", "flower_id = ?", ['TEST']);
//$flower = R::load('flower', 'F01');
//echo $flower;



/* $num = R::count('flower');
  $flower = R::load('flower', 1);
  //$flowers = R::find('flower',' flowerID = ? ', ['F01']);
  echo $num . "<br>";
  echo var_dump($flower);
  echo $flower->flowerID; */
//R::nuke();
//
//$flower = R::dispense("flower");
//$flower->flowerName = "Red Rose";
//$flower->remark = "Hot product";
//$flower->imageURL = "https://i.imgur.com/NCrFi37.jpg";
//$flower->isAvailable = "true";
//
//$flower2 = R::dispense("flower");
//$flower2->flowerName = "Pink Lily";
//$flower2->remark = "Hot product";
//$flower2->imageURL = "https://i.imgur.com/TznGR0m.jpg";
//$flower2->isAvailable = "true";
//
//$flower3 = R::dispense("flower");
//$flower3->flowerName = "Pink Rose";
//$flower3->remark = "Almost out of stocks";
//$flower3->imageURL = "https://i.imgur.com/XWRSfy9.jpg";
//$flower3->isAvailable = "true";
//
//$flower4 = R::dispense("flower");
//$flower4->flowerName = "Sunflower";
//$flower4->remark = "Out of stocks";
//$flower4->imageURL = "https://i.imgur.com/7L0BHFj.jpg";
//$flower4->isAvailable = "false";
//
//
//$arrangement = R::dispense("arrangement");
//$arrangement->name = "99 Red Rose Bouquet";
//$arrangement->price = "499";
//$arrangement->isAvailable = "true";
//$arrangement->imageURL = "https://i.imgur.com/QbDqaGn.jpg";
//$arrangement->flower = $flower;
//$arrangement->stalks = 99;
//
//$arrangement2 = R::dispense("arrangement");
//$arrangement2->name = "Single Sunflower";
//$arrangement2->price = "18";
//$arrangement2->isAvailable = "false";
//$arrangement2->imageURL = "https://i.imgur.com/9bqY5ff.jpg";
//$arrangement2->flower = $flower4;
//$arrangement2->stalks = 1;
//
//$arrangement3 = R::dispense("arrangement");
//$arrangement3->name = "Pink Lily Bouquet";
//$arrangement3->price = "136";
//$arrangement3->isAvailable = "true";
//$arrangement3->imageURL = "https://i.imgur.com/KUrj15Z.jpg";
//$arrangement3->flower = $flower2;
//$arrangement3->stalks = 8;
//
//$arrangement4 = R::dispense("arrangement");
//$arrangement4->name = "50 Red Rose Bouquet";
//$arrangement4->price = "269";
//$arrangement4->isAvailable = "true";
//$arrangement4->imageURL = "https://i.imgur.com/sHekq2d.jpg";
//$arrangement4->flower = $flower;
//$arrangement4->stalks = 50;
//
//$arrangement5 = R::dispense("arrangement");
//$arrangement5->name = "101 Pink Rose Bouquet";
//$arrangement5->price = "488";
//$arrangement5->isAvailable = "true";
//$arrangement5->imageURL = "https://i.imgur.com/BxXy8aY.jpg";
//$arrangement5->flower = $flower3;
//$arrangement5->stalks = 101;
//
//$item = R::dispense("item");
//$item->flower = $flower;
//$item->arrangement = $arrangement;
//$item->quantity = 12;
//$order = R::dispense("orders");
//$order->customerId = "1";
//$order->grandTotal = 100.00;
////$order->deliveryAddress = "Sabah";
//$order->status = "pending";
////$order->targetDate = date_create("2020-07-28 20:00");
//
//
//// Each arrangement, 1 order item
//$orderItem = R::dispense("orderitem");
//$orderItem->arrangement = $arrangement;
//$orderItem->order = $order;
//$orderItem->quantity = 2;
//
//$orderItem2 = R::dispense("orderitem");
//$orderItem2->arrangement = $arrangement3;
//$orderItem2->order = $order;
//$orderItem2->quantity = 4;
//
////Recent Orders
//$recentOrder1 = R::dispense("orderhistory");
//$recentOrder1->name = "101 Pink Rose Bouquet";
//$recentOrder1->price = "488";
//$recentOrder1->imageURL = "https://i.imgur.com/BxXy8aY.jpg";
//$recentOrder1->stalks = 101;
//
//$recentOrder2 = R::dispense("orderhistory");
//$recentOrder2->name = "50 Red Rose Bouquet";
//$recentOrder2->price = "269";
//$recentOrder2->imageURL = "https://i.imgur.com/sHekq2d.jpg";
//$recentOrder2->stalks = 50;
//
//$recentOrder3 = R::dispense("orderhistory");
//$recentOrder3->name = "Pink Lily Bouquet";
//$recentOrder3->price = "136";
//$recentOrder3->imageURL = "https://i.imgur.com/KUrj15Z.jpg";
//$recentOrder3->stalks = 8;
//
//$recentOrder4 = R::dispense("orderhistory");
//$recentOrder4->name = "Single Sunflower";
//$recentOrder4->price = "18";
//$recentOrder4->imageURL = "https://i.imgur.com/9bqY5ff.jpg";
//$recentOrder4->stalks = 1;
//Admin
//$user = R::dispense("user");
//$user->email="johannljx@gmail.com";
//$user->password='$2y$10$RSgNqn5EzNbC3d69yxWj/.rMkJojpp84Ag8qDoOSk8im/bFvZ0bae'; // password = admin123
//$user->name="Johann";
//$user->role="admin";
//$user->status="active";
//$user->phone = "0123456789";
//$user->address = "Buckingham Palace, Sabah";
//$user->attempt = 0;
//
//R::store($user);

//delivery
//To create a new bean (of type 'delivery') use:
$delivery1 = R::dispense("delivery");

//add properties:
$delivery1->cardmessage = "Happy Birthday";
$delivery1->sender = "Kelvin";
$delivery1->sendercontact = "0123456789";
$delivery1->date = "2020-08-30";
$delivery1->timeslot = "12:30";
$delivery1->method = "delivery";
$delivery1->address = "Rumah Papar, KDCA, 89507, 88200 Penampang, Sabah";
$delivery1->deliveryfee = 5.9;
$delivery1->company = "Rumah Papar";
$delivery1->asset_type = "shop";
$delivery1->city_town = "Penampang";
$delivery1->postcode = 88200;
$delivery1->recipient = "Johann";
$delivery1->recipientcontact = "0123456789";

//store the bean in the database
$id = R::store($delivery1);

$delivery2 = R::dispense("delivery");
$delivery2->cardmessage = "I Love You";
$delivery2->sender = "Kelvin";
$delivery2->sendercontact = "0123456789";
$delivery2->date = "2020-08-30";
$delivery2->timeslot = "16:20";
$delivery2->method = "delivery";
$delivery2->address = "Wisma Merdeka, Lot B217, Jalan Tun Razak, Pusat Bandar Kota Kinabalu, 88000 Kota Kinabalu, Sabah";
$delivery2->deliveryfee = 5.9;
$delivery2->company = "";
$delivery2->asset_type = "Lot";
$delivery2->city_town = "Kota Kinabalu";
$delivery2->postcode = 88000;
$delivery2->recipient = "Jackson";
$delivery2->recipientcontact = "0123456789";

$delivery3 = R::dispense("delivery");
$delivery3->cardmessage = "Happy Anniversary";
$delivery3->sender = "Kelvin";
$delivery3->sendercontact = "0123456789";
$delivery3->date = "2020-08-31";
$delivery3->timeslot = "13:45";
$delivery3->method = "delivery";
$delivery3->address = "Kampung Matambai, Jalan Lintas, Kampung Kepayan, 88300 Kota Kinabalu, Sabah";
$delivery3->deliveryfee = 5.9;
$delivery3->company = "Kampung Matambai";
$delivery3->asset_type = "shop";
$delivery3->city_town = "Kampung Kepayan";
$delivery3->postcode = 88200;
$delivery3->recipient = "Haw Quan";
$delivery3->recipientcontact = "0123456789";

$delivery4 = R::dispense("delivery");
$delivery4->cardmessage = "Happy Holiday";
$delivery4->sender = "Kelvin";
$delivery4->sendercontact = "0123456789";
$delivery4->date = "2020-08-31";
$delivery4->timeslot = "17:30";
$delivery4->method = "delivery";
$delivery4->address = "32, Jalan Haji Saman, Pusat Bandar, 88000 Kota Kinabalu, Sabah";
$delivery4->deliveryfee = 5.9;
$delivery4->company = "";
$delivery4->asset_type = "shop";
$delivery4->city_town = "Pusat Bandar";
$delivery4->postcode = 88200;
$delivery4->recipient = "Ryan";
$delivery4->recipientcontact = "0123456789";

$delivery5 = R::dispense("delivery");
$delivery5->cardmessage = "Happy Birthday";
$delivery5->sender = "Kelvin";
$delivery5->sendercontact = "0123456789";
$delivery5->date = "2020-09-01";
$delivery5->timeslot = "10:30";
$delivery5->method = "delivery";
$delivery5->address = "Rumah Papar, KDCA, 89507, 88200 Penampang, Sabah";
$delivery5->deliveryfee = 5.9;
$delivery5->company = "Rumah Papar";
$delivery5->asset_type = "shop";
$delivery5->city_town = "Penampang";
$delivery5->postcode = 88200;
$delivery5->recipient = "Jeremy";
$delivery5->recipientcontact = "0123456789";

$delivery6 = R::dispense("delivery");
$delivery6->cardmessage = "Happy Birthday";
$delivery6->sender = "Kelvin";
$delivery6->sendercontact = "0123456789";
$delivery6->date = "2020-09-02";
$delivery6->timeslot = "12:15";
$delivery6->method = "delivery";
$delivery6->address = "Rumah Papar, KDCA, 89507, 88200 Penampang, Sabah";
$delivery6->deliveryfee = 5.9;
$delivery6->company = "Rumah Papar";
$delivery6->asset_type = "shop";
$delivery6->city_town = "Penampang";
$delivery6->postcode = 88200;
$delivery6->recipient = "Alson";
$delivery6->recipientcontact = "0123456789";

$delivery7 = R::dispense("delivery");
$delivery7->cardmessage = "Happy Birthday";
$delivery7->sender = "Kelvin";
$delivery7->sendercontact = "0123456789";
$delivery7->date = "2020-09-02";
$delivery7->timeslot = "12:15";
$delivery7->method = "delivery";
$delivery7->address = "Rumah Papar, KDCA, 89507, 88200 Penampang, Sabah";
$delivery7->deliveryfee = 5.9;
$delivery7->company = "Rumah Papar";
$delivery7->asset_type = "shop";
$delivery7->city_town = "Penampang";
$delivery7->postcode = 88200;
$delivery7->recipient = "Jack";


$pickup1 = R::dispense("delivery");
$pickup1->cardmessage = "Happy Birthday";
$pickup1->sender = "Kelvin";
$pickup1->sendercontact = "0123456789";
$pickup1->date = "2020-09-02";
$pickup1->timeslot = "12:15";
$pickup1->method = "pickup";

$pickup2 = R::dispense("delivery");
$pickup2->cardmessage = "Happy Birthday";
$pickup2->sender = "Kelvin";
$pickup2->sendercontact = "0123456789";
$pickup2->date = "2020-09-02";
$pickup2->timeslot = "12:15";
$pickup2->method = "pickup";

R::storeAll([$delivery1, $delivery2, $delivery3, $delivery4, $delivery5, $delivery6, $delivery7, $pickup1, $pickup2, ]);


//R::storeAll([$flower, $flower2, $flower3, $flower4, $arrangement, $arrangement2, $arrangement3, $arrangement4, $arrangement5]);
