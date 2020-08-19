<?php
require_once("../Controllers/Security/Session.php");

class ErrorHandler {
    
    public $errors = [];
    
    public function __construct() {
        $this->errors = [];
    }
    
    public function addError($desc) {
        $this->errors[] = $desc;
    }
    
    public function clearErrors() {
        $this->errors = [];
    }
    
    public function getErrors() {
        $errorStr = "";
        foreach ($this->errors as $error) {
            $errorStr .= "- " . $error . "<br>";
        }
        return $errorStr;
    }
    
    public function errorsExist() {
        return sizeof($this->errors) > 0;
    }
    
    public static function displayErrors() {
        // if there's an error msg
        if (Session::itemExists("error")) {
            // display the error msg
            echo Session::get("error");
            // remove the error msg
            Session::delete("error");
        }
    }
    
    public function isNum($value) {
        return !empty($value) && preg_match('/^[0-9]*$/', $value);
    }
    
}
