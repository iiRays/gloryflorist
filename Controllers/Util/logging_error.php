<?php

//call this file to logging all the error
include 'SendError_Log.php';
include 'DatabaseDecorator.php';
include 'EmailDecorator.php';



//
$errorhandler = new SendError_Log();
$errorhandler_via_email = new EmailDecorator($errorhandler);
//$errorhandler_via_database = new DatabaseDecorator($errorhandler);


