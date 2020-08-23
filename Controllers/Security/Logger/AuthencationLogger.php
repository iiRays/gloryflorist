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

class AuthencationLogger extends ALogger {
    /* consider validLogger and invalidLogger for both fail and success cases
     */

    public function validLogger($extra, $fileinfo) {
        // create a log channel
        $log = new Logger('Authencation');

        $logstream = new StreamHandler(__DIR__ .'\..\logging\log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        $log->pushProcessor(function ($record) {
            $record['extra']['env'] = 'staging';
            $record['extra']['version'] = '1.1';
            $record['context'] = array('user' => $_SESSION["user"], 'customerID' => $_SESSION["customerID"], 'checkoutValue' => $_SESSION["checkoutValue"], 'sku_array' => $_SESSION["sku"]);
            return $record;
        });
        
        // add records to the log
        $log->info("Authencation Success");
    }

    public function invalidLogger($e,$fileinfo) {
        // create a log channel
        $log = new Logger('Authencation');

        $logstream = new StreamHandler(__DIR__ .'\..\logging\log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        //consider email/username try to attempt
        // add records to the log
        $log->warning("Authencation Failure", array('exception' => $e));
    }

}
