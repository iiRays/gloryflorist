<?php

/*
  Author: kelvin tham yit hang
 */

//apply these 3 lines of code to log all the error into database 
//echo "ahahhahaa" .__FILE__ ."\..\Views\Account.php";
//require_once (dirname(__FILE__) ."\..\Views\Account.php");
//require_once (__DIR__ ."\..\Views\Account.php");
require_once '/../Security/Logger/DatabaseLogger.php';
$edb = new DatabaseLogger();
//$edb->sendError_Log();
$edb = new EmailLogger();
$edb->sendError_Log();

require_once 'DB.php';


//Establish the database connnection
DB::connect();

//get all data from delivery table in database
$deliveriesArray = R::getAll('select * from delivery');

//Display the data of sender column 
foreach ($deliveriesArray as $result) {
    echo $result['sender'], '<br>';
}

createDeliveryXMLfile($deliveriesArray);

function createDeliveryXMLfile($deliveriesArray) {

    $filePath = 'deliveries.xml';
    $dom = new DOMDocument('1.0', 'utf-8');
    $root = $dom->createElement('deliveries');
    for ($i = 0; $i < count($deliveriesArray); $i++) {
        /*
         * retrieve general info and delivery info
         * selfpickup only need general info
         * delivery need both general info and delivery info
         */
        //general info
        $Id = $deliveriesArray[$i]['id'];
        $CardMessage = $deliveriesArray[$i]['cardmessage'];
        $Sender = $deliveriesArray[$i]['sender'];
        $Contact = $deliveriesArray[$i]['contact'];
        $Method = $deliveriesArray[$i]['method'];

        //delivery info
        $Date = $deliveriesArray[$i]['date'];
        $Address = $deliveriesArray[$i]['address'];
        $Deliveryfee = $deliveriesArray[$i]['deliveryfee'];
        $Company = $deliveriesArray[$i]['company'];
        $Asset_type = $deliveriesArray[$i]['asset_type'];
        $City_town = $deliveriesArray[$i]['city_town'];
        $Postcode = $deliveriesArray[$i]['postcode'];
        $Recipient = $deliveriesArray[$i]['recipient'];
        $Timeslot = $deliveriesArray[$i]['timeslot'];


        //for delivery 
        if (strtoupper($Method) == strtoupper("DELIVERY")) {

            $delivery = $dom->createElement('Delivery');

            $date = $dom->createElement('Date', $Date);
            $delivery->appendChild($date);

            $address = $dom->createElement('Address', $Address);
            $delivery->appendChild($address);

            $deliveryfee = $dom->createElement('DeliveryFee', $Deliveryfee);
            $delivery->appendChild($deliveryfee);

            $company = $dom->createElement('Company', $Company);
            $delivery->appendChild($company);

            $asset_type = $dom->createElement('Asset_type', $Asset_type);
            $delivery->appendChild($asset_type);

            $city_town = $dom->createElement('City_town', $City_town);
            $delivery->appendChild($city_town);

            $postcode = $dom->createElement('Postcode', $Postcode);
            $delivery->appendChild($postcode);

            $recipient = $dom->createElement('Recipient', $Recipient);
            $delivery->appendChild($recipient);

            $timeslot = $dom->createElement('Timeslot', $Timeslot);
            $delivery->appendChild($timeslot);
        }
        //for selfpickup
        else {
            $delivery = $dom->createElement('SelfPickUp');
        }
        //general info
        $delivery->setAttribute('Id', $Id);
        $cardmessage = $dom->createElement('CardMessage', $CardMessage);
        $delivery->appendChild($cardmessage);

        $sender = $dom->createElement('Sender', $Sender);
        $delivery->appendChild($sender);

        $contact = $dom->createElement('Contact', $Contact);
        $delivery->appendChild($contact);

        $method = $dom->createElement('Method', $Method);
        $delivery->appendChild($method);

        $root->appendChild($delivery);
    }
    $dom->appendChild($root);
    $dom->save($filePath);
}
