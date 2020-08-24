<?php

/*
 *  Author: kelvin tham yit hang
 */
//include the logger class to log the unhandle error/exception..
require_once __DIR__ . '\..\Controllers\Security\Logger\LoggerFactory.php';

$logger = new LoggerFactory;
$logger = $logger->createLogger("UNCAUGHTERROR");
$logger->invalidLogger(null, null);

//$logger->createLogger()->invalidLogger($e = NULL);
//authorization check
require_once __DIR__ . '\..\Controllers\Security\Authorize.php';
Authorize::onlyAllow("customer");
//for other usage
require_once __DIR__ . '\..\Controllers\Util\Quick.php';
require_once __DIR__ . '\..\Controllers\Util\DB.php';
require_once __DIR__ . '\..\Controllers\Util\rb.php';

//input validation
require_once __DIR__ . '\..\Controllers\Security\Validator.php';

// session usage
require_once __DIR__ . '\..\Controllers\Security\Session.php';



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

    if (!preg_match("/^[a-zA-Z ]*$/", $sender)) {
        $nameErr = "Name can only have letters and space only";
    }
    if (!preg_match('/^[0-9]{10,11}+$/', $sendercontact)) {
        $phoErr = "Phone must consist of 10 or 11 digits";
    }

//check got error or not
    if (isset($nameErr) || isset($phoErr)) {
        //if got error proceed here
        //display error 
        if (isset($nameErr)) {
            echo 'Sender name: ' . $nameErr . '<br/>';
        }
        if (isset($phoErr)) {
            echo 'Contact number: ' . $phoErr . '<br/>';
        }
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
            // $id = R::store($delivery); DONT STORE YET
            Session::set("delivery", $delivery);
            echo "store into databse already";

            //redirect to another page and die this page
            header("Location: http://localhost/GloryFlorist/Controllers/Ordering/create_order.php");
            exit();
        } else {

            //set session for the next delivery address page
            $_SESSION['deliverytype'] = $deliverytype;
            $_SESSION['date'] = $date;
            $_SESSION['time'] = $time;
            $_SESSION['cardmsg'] = $cardmsg;
            $_SESSION['sender'] = $sender;
            $_SESSION['sendercontact'] = $sendercontact;

            //redirect to another page and die this page
            header("Location: http://localhost/GloryFlorist/Controllers/Ordering/deliveryAddress.php");
            exit();
        }
    }
} else {
    //page's input field is not set/post
}
    