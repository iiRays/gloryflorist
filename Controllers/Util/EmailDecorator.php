<?php

require_once 'SendError_LogDecorator.php';
require_once 'error_constant_to_name.php'; //convert the error_type (int) to string and send as subject
require_once 'EmailFactory.php';


class EmailDecorator extends SendError_LogDecorator {

    public function __construct($error_log) {
        parent::__construct($error_log);
        return $this->sendError_Log();
    }

    public function sendError_Log() {
        set_error_handler(array($this, 'send_error_log_via_email'));
    }

    function send_error_log_via_email($error_type, $error_string, $error_file, $error_line, $vars) {
        echo 'email 1' ;
        $email = "
        <p>An error ($error_type) occurred on line 
        <strong>$error_line</strong> and in the <strong>file: $error_file.</strong> 
        <p> $error_string </p>";

        $email .= "<pre>" . print_r($vars, 1) . "</pre>";

        $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        //Email the error to our developer/maintainer
        //May consider lopping for email list if more than one ppl to send
        $em = new EmailFactory;
        $em->build()->send('kelvintyh-am17@student.tarc.edu.my', error_constant_to_name($error_type), $email);
        echo 'email 2' ;
        //for client side error msg, for testing here, can remove later
        if (($error_type !== E_NOTICE) && ($error_type < 2048)) {
            die("There was an error. Please try again later.");
        }
    }

}
