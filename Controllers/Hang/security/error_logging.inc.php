<?php

require_once("rb.php");
require_once("DB.php");

DB::connect();

//is used by set error handler to log errors
function log_error($error_type, $error_string, $error_file, $error_line) {
    $error = R::dispense('errors');
    $error->error_type = $error_type;
    $error->error_time = R::isoDateTime();
    $error->error_string = $error_string;
    $error->error_file = $error_file;
    $error->error_line = $error_line;
    $id = R::store($error);
}

//fecthes all of the error logged
function fetch_errors() {
    $errorArray = R::getAll('SELECT * FROM errors');
    return $errorArray;
}
