<?php

/*
  Author: kelvin tham yit hang
 */
require_once '../Controller/Util/Logger/DatabaseLogger.php';
require_once("rb.php");
require_once("DB.php");

$edb = DatabaseLogger::sendError_Log();
DB::connect();

try{
    $deliveriesArray = R::getAll('select * from delivery');
} catch (Exception $ex) {
    
}




createDeliveryXMLfile($deliveriesArray);
foreach ($deliveriesArray as $result) {
    echo $result['sender'], '<br>';
}


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

