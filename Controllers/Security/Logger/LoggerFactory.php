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



    public function createLogger($loggerType) {
        if ($loggerType == null)
            return null;

        if (strcasecmp($loggerType, "INPUTVALIDATION") == 0)
            return new InputValidationLogger();

        if (strcasecmp($loggerType, "AUTHENTICATION") == 0)
            return new AuthencationLogger();

        if (strcasecmp($loggerType, "UNCAUGHTERROR") == 0)
            return new UncaughtErrorLogger();

        if (strcasecmp($loggerType, "TEMPERINGEVENT") == 0)
            return new TemperingEventLogger();

        return null;
    }

}
