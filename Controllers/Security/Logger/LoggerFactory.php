<?php

/*
 * Author: kelvin tham yit hang
 * 
 */
require_once 'AuthencationLogger.php';
require_once 'InputValidationLogger.php';
require_once 'UncaughtErrorLogger.php';
require_once 'TemperingEventLogger.php';

class LoggerFactory {

    private $loggerType;

    function __construct($type) {
        $this->loggerType = $type;
    }

    public function createLogger() {
        if ($this->loggerType == null)
            return null;

        if (strcasecmp($this->loggerType, "INPUTVALIDATION") == 0)
            return new InputValidationLogger();

        if (strcasecmp($this->loggerType, "AUTHENTICATION") == 0)
            return new AuthencationLogger();

        if (strcasecmp($this->loggerType, "UNCAUGHTERROR") == 0)
            return new UncaughtErrorLogger();

        if (strcasecmp($this->loggerType, "TEMPERINGEVENT") == 0)
            return new TemperingEventLogger();

        return null;
    }

}
