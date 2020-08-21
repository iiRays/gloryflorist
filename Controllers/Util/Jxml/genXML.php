<?php

require_once("../rb.php");
require_once("../DB.php");

DB::connect();

$UserArray = R::getAll('SELECT * FROM user');

createXMLfile($UserArray);
foreach ($UserArray as $result) {
    echo $result['name'], '<br>';
}

function createXMLfile($UserArray) {

    $filePath = 'allUser.xml';
    $dom = new DOMDocument('1.0', 'utf-8');
    $root = $dom->createElement('allUser');
    for ($i = 0; $i < count($UserArray); $i++) {

        //retrieve user info
        $Id = $UserArray[$i]['id'];
        $Name = $UserArray[$i]['name'];
        $Email = $UserArray[$i]['email'];
        $Phone = $UserArray[$i]['phone'];
        $Address = $UserArray[$i]['address'];
        $Role = $UserArray[$i]['role'];
        $Status = $UserArray[$i]['status'];

        $users = $dom->createElement('User');
        
        //user info
        $users->setAttribute('Id', $Id);
        
        $id = $dom->createElement('ID', $Id);
        $users->appendChild($id);
        
        $name = $dom->createElement('Name', $Name);
        $users->appendChild($name);

        $email = $dom->createElement('Email', $Email);
        $users->appendChild($email);

        $phone = $dom->createElement('Phone', $Phone);
        $users->appendChild($phone);

        $address = $dom->createElement('Address', $Address);
        $users->appendChild($address);

        $role = $dom->createElement('Role', $Role);
        $users->appendChild($role);

        $status = $dom->createElement('Status', $Status);
        $users->appendChild($status);
        
        $root->appendChild($users);
    }
    $dom->appendChild($root);
    $dom->save($filePath);
}
