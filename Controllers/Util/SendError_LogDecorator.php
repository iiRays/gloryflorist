<?php

/*
  Author: kelvin tham yit hang
 */
require_once 'ISendError_Log.php';

abstract class SendError_LogDecorator implements ISendError_Log {

    protected $error_log;

    public function __construct($error_log) {
        $this->error_log = $error_log;
    }

    function getError_log() {
        return $this->error_log;
    }

    function setError_log($error_log) {
        $this->error_log = $error_log;
    }
    
    public abstract function sendError_Log();
    


}
