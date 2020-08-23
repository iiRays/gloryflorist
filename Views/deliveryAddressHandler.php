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
//Authorize::onlyAllow("customer"); //temperory disable for better coding envir

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
    $validator = new Validator();
    $validator->validateName($recipient);
    $validator->validatePhone($recipientcontact);
    $validator->validateNumOnly($postcode);

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
            $m .= 'Recipient name: ' . $result[0] . '<br/>';
        }
        if (isset($result[1])) {
            $m .= 'Contact number: ' . $result[1] . '<br/>';
        }
        if (isset($result[2])) {
            $m .= 'Post Code: ' . $result[2] . '<br/>';
        }
        echo $m;
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
        header("Location: http://localhost/GloryFlorist/Views/create_order.php");
        exit();
    }
} else {
    //page's input field is not set/post

}