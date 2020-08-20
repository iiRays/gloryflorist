<?php

/*
  Author: kelvin tham yit hang
 */
require_once("rb.php");
require_once("DB.php");

DB::connect();

$deliveriesArray = R::getAll('select * from delivery');

createXMLfile($deliveriesArray);
foreach ($deliveriesArray as $result) {
    echo $result['name'], '<br>';
}

function createXMLfile($deliveriesArray) {

    $filePath = 'deliveries.xml';
    $dom = new DOMDocument('1.0', 'utf-8');
    $root = $dom->createElement('deliveries');
    for ($i = 0; $i < count($deliveriesArray); $i++) {

        //retrieve general info included selfpickup info
        $Id = $deliveriesArray[$i]['id'];
        $Method = $deliveriesArray[$i]['method'];
        $CardMessage = $deliveriesArray[$i]['cardmessage'];
        $Remark = $deliveriesArray[$i]['remark'];
        $Name = $deliveriesArray[$i]['name'];
        $Contact = $deliveriesArray[$i]['contact'];
        $Datetime = $deliveriesArray[$i]['datetime'];

        //retrieve additonal delivery info
        $Address = $deliveriesArray[$i]['address'];
        $Fee = $deliveriesArray[$i]['deliveryfee'];

        //show additional delivery info
        if (strtoupper($Method) == strtoupper("DELIVERY")) {

            $delivery = $dom->createElement('Delivery');

            $address = $dom->createElement('Address', $Address);
            $delivery->appendChild($address);

            $fee = $dom->createElement('DeliveryFee', $Fee);
            $delivery->appendChild($fee);
        }
        //show selfpickup
        else{
            $delivery = $dom->createElement('SelfPickUp');
        }
        //delivery info
        $delivery->setAttribute('Id', $Id);
        $cardmessage = $dom->createElement('CardMessage', $CardMessage);
        $delivery->appendChild($cardmessage);

        $remark = $dom->createElement('Remark', $Remark);
        $delivery->appendChild($remark);

        $name = $dom->createElement('Name', $Name);
        $delivery->appendChild($name);

        $contact = $dom->createElement('Contact', $Contact);
        $delivery->appendChild($contact);

        $datetime = $dom->createElement('Datetime', $Datetime);
        $delivery->appendChild($datetime);

        $root->appendChild($delivery);
    }
    $dom->appendChild($root);
    $dom->save($filePath);
}
