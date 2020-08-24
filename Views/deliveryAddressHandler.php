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
require_once __DIR__ . '\..\Controllers\Security\Session.php';

if (isset($_POST['recipientname']) && isset($_POST['company']) && isset($_POST['address']) && isset($_POST['apartment-suite-unit-etc']) && isset($_POST['city-town']) && isset($_POST['postcode']) && isset($_POST['recipientcontact'])) {


//get data inputed
    $recipient = Quick::getPostData("recipientname");
    $company = Quick::getPostData("company");
    $address = Quick::getPostData("address");
    $asset_type = Quick::getPostData("apartment-suite-unit-etc");
    $city_town = Quick::getPostData("city-town");
    $postcode = Quick::getPostData("postcode");
    $recipientcontact = Quick::getPostData("recipientcontact");

//validate input
    if (!preg_match("/^[a-zA-Z ]*$/", $recipient)) {
        $nameErr = "Name can only have letters and space only";
    }
    if (!preg_match('/^[0-9]{10,11}+$/', $recipientcontact)) {
        $phoErr = "Phone must consist of 10 or 11 digits";
    }

    if (!preg_match('/^[0-9]*$/', $postcode)) {
        $numErr = "Number only";
    }


//check got error or not
    if (isset($nameErr) || isset($phoErr) || isset($numErr)) {
        //if got error proceed here
        //display error 
        echo '<div style="margin-left: 25%;border: 1px solid black; width: 50%; color:white; background-color:#FF6347; padding: 10px">';
        if (isset($nameErr)) {
            echo 'Sender name: ' . $nameErr . '<br/>';
        }
        if (isset($phoErr)) {
            echo 'Contact number: ' . $phoErr . '<br/>';
        }
        if (isset($numErr)) {
            echo 'Postcode: ' . $numErr . '<br/>';
        }
        echo '</div>';
    } else {
        //if no error proceed here...
        //store in database
        DB::connect();
        $delivery = R::dispense('delivery');
        $delivery->cardmessage = $_SESSION["cardmsg"];
        $delivery->sender = $_SESSION["sender"];
        $delivery->sendercontact = $_SESSION["sendercontact"];
        $delivery->date = $_SESSION["date"];
        $delivery->timeslot = $_SESSION["time"];
        $delivery->method = $_SESSION["deliverytype"];
        $delivery->address = $address;
        $delivery->deliveryfee = 5.9;
        $delivery->company = $company;
        $delivery->asset_type = $asset_type;
        $delivery->city_town = $city_town;
        $delivery->postcode = $postcode;
        $delivery->recipient = $recipient;
        $delivery->recipientcontact = $recipientcontact;
//        $id = R::store($delivery); DONT STORE YET
        Session::set("delivery", $delivery);


        //redirect to another page and die this page
        header("Location: http://localhost/GloryFlorist/Controllers/Ordering/create_order.php");
        exit();
    }
} else {
    //page's input field is not set/post
}