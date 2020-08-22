<?php
/*
  Author: kelvin tham yit hang
  */
require_once __DIR__ .'\..\logging\vendor\autoload.php';
require_once 'ALogger.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\JsonFormatter;

date_default_timezone_set('Asia/Kuala_Lumpur');

class InputValidationLogger extends ALogger{

    public function validLogger($extra=NULL, $fileinfo=NULL) {
        // create a log channel
        $log = new Logger('Input Validation');
       
        $logstream = new StreamHandler(__DIR__ .'\..\logging\log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        // add records to the log
        $log->info("Input validation Success. [File Info]=>" .$fileinfo);
    }

    public function invalidLogger($e=NULL, $fileinfo=NULL) {
        // create a log channel
        $log = new Logger('Input Validation');

        $logstream = new StreamHandler(__DIR__ .'\..\logging\log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        // add records to the log
        $log->warning("Input validation Failure. [File Info]=>" .$fileinfo, array('exception' => $e));
    }

}
