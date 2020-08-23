<?php

/*
  Author: kelvin tham yit hang
 */

require_once __DIR__ . '\..\..\Util\DB.php';
require_once __DIR__ . '\..\..\Util\rb.php';

class EmailLogger {

    public function __construct() {
        
    }

    public function sendError_Log() {
        //get data from database
        $rs = R::getAll('select * from errors order by id desc limit 1');

//        $error = array();
//        foreach ($result as $rs) {
//            $error = $rs['id'];
//            $error = $rs['error_type'];
//            $error = $rs['error_string'];
//            $error = $rs['error_file'];
//            $error = $rs['error_line'];
//        }
        
        $s = send_error_log_via_email(
                $rs['id'],
                $rs['error_type'],
                $rs['error_string'],
                $rs['error_file'],
                $rs['error_line']);
    }

    static function send_error_log_via_email($id, $error_type, $error_string, $error_file, $error_line) {

        $email = "
        <p>Error id =  $id</p>
        <p>An error ($error_type) occurred on line 
        <strong>$error_line</strong> and in the <strong>file: $error_file.</strong> 
        <p> $error_string </p>";

        $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        //Email the error to our developer/maintainer
        //May consider lopping for email list if more than one ppl to send
        Email::send('kelvintyh-am17@student.tarc.edu.my', error_constant_to_name($error_type), $email);
        Email::send('gloryfloristflora@gmail.com', error_constant_to_name($error_type), $email);

        echo "We already notify our maintainer, we'll be come back soon...";
    }

}
