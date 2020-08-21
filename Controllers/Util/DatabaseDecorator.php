<?php

require_once 'SendError_LogDecorator.php';
require_once 'Quick.php';
require_once 'rb.php';
require_once 'DB.php';

//establish database connection
DB::connect();

class DatabaseDecorator extends SendError_LogDecorator {
  
    public function __construct($error_log) {
        parent::__construct($error_log);
        return $this->sendError_Log();
    }

    public function sendError_Log() {
        set_error_handler(array($this, 'send_error_log_via_database'));
    }

    public function send_error_log_via_database($error_type, $error_string, $error_file, $error_line) {
        $error = R::dispense('errors');
        $error->error_type = $error_type;
        $error->error_time = Quick::getCurrentTime();
        $error->error_string = $error_string;
        $error->error_file = $error_file;
        $error->error_line = $error_line;
        $id = R::store($error);
        echo $id ." database";
    }

    public function fetch_errors() {
        $errorArray = R::getAll('SELECT * FROM errors');
        return $errorArray;
    }

}
