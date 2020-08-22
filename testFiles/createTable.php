<?php

/*
  Author: kelvin tham yit hang
 */
echo __DIR__;
require_once __DIR__ .'\..\Controllers\Util\DB.php';
require_once __DIR__ .'\..\Controllers\Util\rb.php';
require_once __DIR__ .'\..\Controllers\Security\Logger\TemperingEventLogger.php';
$_SESSION["user"] = "testing user";
DB::connect();
$delivery = R::dispense( 'delivery' );
$delivery->cardmessage = 'Every year with you is sweeter than the last.';
$delivery->name = 'Jaren Yeap Wei Loon';
$delivery->contact = '012-4307437';
$delivery->datetime = R::isoDateTime();
$delivery->method = 'Delivery';
$delivery->address = 'xxx';
$delivery->deliveryfee = '5.90';
$id = R::store($delivery);
$e = \TemperingEventLogger::validLogger($delivery);
//
//$delivery = R::dispense( 'delivery' );
//$delivery->cardmessage = 'Beautiful flowers for a even more beautiful you.';
//$delivery->remark = '';
//$delivery->name = 'Cheah Kah Heng';
//$delivery->contact = '016-3866617';
//$delivery->datetime = R::isoDateTime();
//$delivery->method = 'SelfPickup';
//$delivery->address = '';
//$delivery->deliveryfee = '';
//$id = R::store($delivery);


/*$paymentDate = date('Y-m-d');
$paymentDate=date('Y-m-d', strtotime($paymentDate));
//echo $paymentDate; // echos today! 
$contractDateBegin = date('Y-m-d', strtotime("01/01/2020 00:00:18"));
$contractDateEnd = date('Y-m-d', strtotime("01/01/2021"));
    
if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
    echo "is between";
}else{
    echo "NO GO!";  
}*/
//R::exec( 'INSERT INTO delivery VALUES ("Beautiful flowers for a even more beautiful you.","","Cheah Kah Heng","016-3866617","","SelfPickup","","")');
//$id = R::getInsertID();

