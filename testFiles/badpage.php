<?php
/*
  Author: kelvin tham yit hang
  */
require_once __DIR__ . '\..\Controllers\Security\Logger\LoggerFactory.php';
require_once __DIR__ . '\..\Controllers\Security\Logger\Tools.php';
$logger = new LoggerFactory("UNCAUGHTERROR");
$logger->createLogger()->invalidLogger(null,null);


echo "<h1>badpage.php</h1>";
$item = new Gay();

//
//require_once '../Controllers/Util/logging/vendor/autoload.php';
//require_once '../Controllers/Util/inputValidationLogger.php';






/*use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\JsonFormatter;
date_default_timezone_set('Asia/Kuala_Lumpur');


// create a log channel
$log = new Logger('transactions');

$logstream = new StreamHandler('../Controllers/Util/logging/log.txt', Logger::DEBUG);

//Apply Monolog's built-in JsonFormatter
$logstream->setFormatter(new JsonFormatter());

// Push the $logstream handler onto the Log object
$log->pushHandler($logstream);
$log->pushHandler(new FirePHPHandler());



function checkUsername($username) {
    if (strlen($username) < 4) {
        throw new Exception("Username $username is not long enough.");
    } else if (strlen($username) > 12) {
        throw new Exception("Username $username is too long.");
    }else{
        echo 'hahaha';
        $ex = \inputValidationLogger::validLogger("username is valid");
    }
    // $username is OK
}

try {
    checkUsername('mrrrrrre');
} catch (exception $e) {
    //$message_string = "{$e->getMessage()} (file: {$e->getFile()}, line: {$e->getLine()})";
    //$log->error("Input validation Failure", array('exception' => $e));
    $ex = \inputValidationLogger::invalidLogger($e);
}*/
//PSR-3, states that a logged exception must be in the exception element of the context array
//$logger->error("checkUsername failed", array('exception' => $e));

// Define default behavior if an exception isn't caught:
//set_exception_handler( function($e) {        
//    $uncaught_log = new Logger('uncaught');
//    $uncaught_logstream = new StreamHandler('/var/log/monolog/php.log', Logger::ERROR);
//    $uncaught_logstream->setFormatter(new JsonFormatter());
//    $uncaught_log->pushHandler($uncaught_logstream);
//    $uncaught_log->error("Uncaught exception", array('exception' => $e));
//});

