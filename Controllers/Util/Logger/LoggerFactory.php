<?php

/*
 * Author: kelvin tham yit hang
 * 
 */
require_once 'AuthencationLogger.php';
require_once 'InputValidationLogger.php';

class LoggerFactory {

    protected $loggerType;

    function __construct($type) {
        $this->loggerType = $type;
    }

    function createConnection() {
        if ($loggerType == null)
            return null;

        if (strcasecmp($loggerType, "INPUTVALIDATION") == 0)
            return new InputValidationLogger();
        
        if (strcasecmp($loggerType, "AUTHENTICATION") == 0)
            return new AuthencationaLogger();

        return null;
    }

}
