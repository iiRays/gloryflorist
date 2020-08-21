<?php
/*
  Author: kelvin tham yit hang
  */

require_once '../Controllers/Util/logging/vendor/autoload.php';
require_once 'ALogger.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\JsonFormatter;

date_default_timezone_set('Asia/Kuala_Lumpur');

class InputValidationLogger extends ALogger{

    public function validLogger($msg) {
        // create a log channel
        $log = new Logger('Input Validation');
       
        $logstream = new StreamHandler('../Controllers/Util/logging/log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        // add records to the log
        $log->info("Input validation Success");
    }

    public function invalidLogger($e) {
        // create a log channel
        $log = new Logger('Input Validation');

        $logstream = new StreamHandler('../Controllers/Util/logging/log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        // add records to the log
        $log->warning("Input validation Failure", array('exception' => $e));
    }

}
