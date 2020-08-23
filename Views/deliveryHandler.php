<?php

/*
 *  Author: kelvin tham yit hang
 */
//include the logger class to log the unhandle error/exception..
require_once __DIR__ . '\..\Controllers\Security\Logger\LoggerFactory.php';

$logger = new LoggerFactory("UNCAUGHTERROR");
//$logger->createLogger()->invalidLogger($e = NULL);
//authorization check
require_once __DIR__ . '\..\Controllers\Security\Authorize.php';
Authorize::onlyAllow("customer"); //temperory disable for better coding envir
//for other usage
require_once __DIR__ . '\..\Controllers\Util\Quick.php';
require_once __DIR__ . '\..\Controllers\Util\DB.php';
require_once __DIR__ . '\..\Controllers\Util\rb.php';

//input validation
require_once __DIR__ . '\..\Controllers\Security\Validator.php';




if (isset($_POST['deliveryType']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['cardmsg']) && isset($_POST['sender']) && isset($_POST['sendercontact'])) {

//input validation
//get form input
    $deliverytype = Quick::getPostData("deliveryType");
    $date = Quick::getPostData("date");
    $time = Quick::getPostData("time");
    $cardmsg = Quick::getPostData("cardmsg");
    $sender = Quick::getPostData("sender");
    $sendercontact = Quick::getPostData("sendercontact");

//validate input
    $validator = new Validator();
    $validator->validateName($sender);
    $validator->validatePhone($sendercontact);

//get error msg
    $errMsg = array();
    $errMsg = $validator->getError();

//check got error or not
    if (count($errMsg) != 0) {
        //if got error proceed here

        $result = array();
        foreach ($errMsg as $msgs) {
            foreach ($msgs as $msg) {
                $result[] = $msg;
            }
        }
        //store error msg into variable(folo ur seq in validate input thre
        //display error 
        $m = "";
        if (isset($result[0])) {
            $m .= 'Sender name: ' . $result[0] . '<br/>';
        }
        if (isset($result[1])) {
            $m .= 'Contact number: ' . $result[1] . '<br/>';
        }
        echo $m;
    } else {
        //if no error proceed here
        if ($deliverytype == "pickup") {
            //since it is pickup, no need to proceed to delivery address page
            //store the data into database here
            DB::connect();

            $delivery = R::dispense('delivery');
            $delivery->method = $deliverytype;
            $delivery->cardmessage = $cardmsg;
            $delivery->sender = $sender;
            $delivery->sendercontact = $sendercontact;
            $delivery->date = $date;
            $delivery->timeslot = $time;
            $id = R::store($delivery);
            echo "store into databse already";

            //redirect to another page and die this page
            header("Location: http://localhost/GloryFlorist/Views/create_order.php");
            exit();
        } else {
            session_start();

            //set session for the next delivery address page
            $_SESSION['deliverytype'] = $deliverytype;
            $_SESSION['date'] = $date;
            $_SESSION['time'] = $time;
            $_SESSION['cardmsg'] = $cardmsg;
            $_SESSION['sender'] = $sender;
            $_SESSION['sendercontact'] = $sendercontact;
            
            //redirect to another page and die this page
            header("Location: http://localhost/GloryFlorist/Views/deliveryAddress.php");
            exit();
        }
    }
} else {
    //page's input field is not set/post
}
    