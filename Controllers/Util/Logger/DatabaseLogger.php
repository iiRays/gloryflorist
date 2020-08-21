<?php
/*
  Author: kelvin tham yit hang
  */

require_once '../Controllers/Util/Quick.php';
require_once '../Controllers/Util/rb.php';
require_once '../Controllers/Util/DB.php';

//establish database connection
DB::connect();

class DatabaseLogger{

    public function __construct() {
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
        die("Some error eccured and are logged, please try again later..");
    }

    public function fetch_errors() {
        $errorArray = R::getAll('SELECT * FROM errors');
        return $errorArray;
    }

}
