<?php

/*
  Author: kelvin tham yit hang
 */
require_once __DIR__ . '\..\logging\vendor\autoload.php';
require_once 'ALogger.php';
require_once 'Tools.php';
require_once __DIR__ . '\..\..\Util\Quick.php';
require_once __DIR__ . '\..\..\Util\DB.php';
require_once __DIR__ . '\..\..\Util\rb.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\JsonFormatter;

date_default_timezone_set('Asia/Kuala_Lumpur');
//establish database connection
DB::connect();

class UncaughtErrorLogger extends ALogger{

    public function validLogger($extra,$fileinfo) {
        
    }

    public function invalidLogger($e, $fileinfo) {
        
        //get file info        
        $fileinfo = get_fileinfo();
        
        // create a log channel
        $log = new Logger('Uncaught Error');

        $logstream = new StreamHandler(__DIR__ . '\..\logging\log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        //consider email/username try to attempt
        // add records to the log
        $log->error("Uncaught Error. [File Info]=>" .$fileinfo, array('exception' => $e));
        
        //handle the uncaught/unexpected error
        //store to database 
        set_error_handler(array($this, 'send_error_log_via_database'));
        die("Some error eccured and are logged, please try again later..");
    }

    public function send_error_log_via_database($error_type, $error_string, $error_file, $error_line) {
        $error = R::dispense('errors');
        $error->error_type = $error_type;
        $error->error_time = Quick::getCurrentTime();
        $error->error_string = $error_string;
        $error->error_file = $error_file;
        $error->error_line = $error_line;
        $id = R::store($error);

    }

    public function fetch_errors() {
        $errorArray = R::getAll('SELECT * FROM errors');
        return $errorArray;
    }

}
