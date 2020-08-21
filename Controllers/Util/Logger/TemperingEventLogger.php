<?php

/*
  user,event,date,table,field,new value

  user - who made change
  event - as code of predefined events (update, save, insert)
  date - when the change was made
  table & field - can be auto localized from global query
  value - inserted value
 */
require_once 'ALogger.php';
require_once '../Controllers/Util/logging/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\JsonFormatter;

class TemperingEventLogger extends ALogger {

    public function validLogger($query) {
        // create a log channel
        $log = new Logger('Tempering Event');

        $logstream = new StreamHandler('../Controllers/Util/logging/log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        $logger->pushProcessor(function ($record) {
            $record['extra']['version'] = '1.1';
            $record['context'] = array(
                'user' => $_SESSION["user"]);
            return $record;
        });

        // add records to the log
        $log->info("Tempering Event Success", array("Query executed: "=>$query));
    }

    public function invalidLogger($e) {
        // create a log channel
        $log = new Logger('Tempering Event');

        $logstream = new StreamHandler('../Controllers/Util/logging/log.txt', Logger::DEBUG);

        //Apply Monolog's built-in JsonFormatter
        $logstream->setFormatter(new JsonFormatter());

        // Push the $logstream handler onto the Log object
        $log->pushHandler($logstream);
        $log->pushHandler(new FirePHPHandler());

        //populate log's context and extra arrays
        // add records to the log
        $log->warning("Tempering Event Failure", array('exception' => $e));
    }

}
