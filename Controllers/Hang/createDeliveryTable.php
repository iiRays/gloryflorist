<?php

/*
  Author: kelvin tham yit hang
 */
//require_once("rb.php");
//require_once("DB.php");

//DB::connect();
//$delivery = R::dispense( 'delivery' );
//$delivery->cardmessage = 'Every year with you is sweeter than the last.';
//$delivery->remark = '';
//$delivery->name = 'Jaren Yeap Wei Loon';
//$delivery->contact = '012-4307437';
//$delivery->datetime = R::isoDateTime();
//$delivery->method = 'Delivery';
//$delivery->address = 'xxx';
//$delivery->deliveryfee = '5.90';

$date1 = date('Y-m-d');
$date1 = date('Y-m-d', strtotime("2020-08-17"));
//$date2 = "2020-08-17";
$begin = date('Y-m-d', strtotime("2020-08-01"));
$end = date('Y-m-d', strtotime("2020-08-31"));
if(date1 >= begin && date1 <= end){
    echo 'hooray, is between';
}
        
//$id = R::store($delivery);


//R::exec( 'INSERT INTO delivery VALUES ("","","Cheah Kah Heng","","","","","")');
//$id = R::getInsertID();

