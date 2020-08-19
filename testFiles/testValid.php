<?php

require_once("../Controllers/Security/Validator.php");

//get form input
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$decNum = $_POST['2decimal'];
$password = $_POST['password'];
$cPassword = $_POST['cPassword'];
$phone = $_POST['phone'];

//validate input
$validator = new Validator();
$validator->validateLetterOnly($name);
$validator->validateEmail($email);
$validator->validateNumOnly($number);
$validator->validateTwoDecimal($decNum);
$validator->validatePassword($password, $cPassword);
$validator->validatePhone($phone);

//get error msg
$errMsg = array();
$errMsg = $validator->getError();

$result = array();
foreach ($errMsg as $msgs) {
    foreach ($msgs as $msg) {
        $result[] = $msg;
    }
}

//store error msg into variable(folo ur seq in validate input thre
$nameErr = $result[0];
$emailErr = $result[1];
$numErr = $result[2];
$decErr = $result[3];
$pasErr = $result[4];
$phoErr = $result[5];

//display error based on ur own design
echo 'Name: ' . $nameErr . '<br/>'.
        'Email: ' . $emailErr . '<br/>'.
        'Number: ' . $numErr . '<br/>'.
        '2 decimal: ' . $decErr . '<br/>'.
        'Password & confirm password: ' . $pasErr . '<br/>'.
        'Phone: ' . $phoErr . '<br/>';

//if ur validation no error then can continue ur own action or php
if($nameErr == "No error" && $emailErr == "No error" && $numErr == "No error" && $decErr == "No error" && $pasErr == "No error" && $phoErr == "No error"){
    //proceed ur action
}