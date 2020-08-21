<?php

/*
  Author: kelvin tham yit hang
 */

require_once 'error_constant_to_name.php'; //convert the error_type (int) to string and send as subject
require_once '../Controllers/Util/EmailFactory.php';
require_once 'DatabaseLogger.php';
require_once '../Controllers/Util/rb.php';
require_once '../Controllers/Util/DB.php';

class EmailLogger {

    public function __construct() {
        
    }

    public function sendError_Log() {
        //get data from database
        $result = R::getAll('select * from errors order by id desc limit 1');

        foreach ($result as $rs) {
            echo $rs['id'], '<br>';
        
        $this->send_error_log_via_email(
                $rs['error_type'],
                $rs['error_string'],
                $rs['error_file'],
                $rs['error_line']);
        }
    }

    function send_error_log_via_email($error_type, $error_string, $error_file, $error_line) {

        $email = "
        <p>An error ($error_type) occurred on line 
        <strong>$error_line</strong> and in the <strong>file: $error_file.</strong> 
        <p> $error_string </p>";

        $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        //Email the error to our developer/maintainer
        //May consider lopping for email list if more than one ppl to send
        $em = \EmailFactory;
        $em->build()->send('kelvintyh-am17@student.tarc.edu.my', error_constant_to_name($error_type), $email);

        echo "We already notify our maintainer, we'll be come back soon...";
    }

}
