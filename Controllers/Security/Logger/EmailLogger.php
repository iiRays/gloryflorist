<?php

/*
  Author: kelvin tham yit hang
 */


require_once __DIR__ . '\..\..\Util\Email.php';
require_once __DIR__ . '\..\..\Util\DB.php';
require_once __DIR__ . '\..\..\Util\rb.php';

function sendError_Log() {
//get data from database
    $result = R::getAll('select * from errors order by id desc limit 1');

        $error = array();
        foreach ($result as $rs) {
            echo $rs['id'];
            echo $rs['error_type'];
            echo $rs['error_string'];
            echo $rs['error_file'];
            echo $rs['error_line'];
        }

    send_error_log_via_email(
            $rs['id'],
            $rs['error_type'],
            $rs['error_string'],
            $rs['error_file'],
            $rs['error_line']);
}

function send_error_log_via_email($id, $error_type, $error_string, $error_file, $error_line) {

    $email = "
        <p>Error id =  $id</p>
        <p>An error ($error_type) occurred on line 
        <strong>$error_line</strong> and in the <strong>file: $error_file.</strong> 
        <p> $error_string </p>";

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//Email the error to our developer/maintainer
//May consider lopping for email list if more than one ppl to send
    $em = new Email();
    $em::send('kelvintyh-am17@student.tarc.edu.my', error_constant_to_name($error_type), $email);

    echo "We already notify our maintainer, we'll be come back soon...";
}
