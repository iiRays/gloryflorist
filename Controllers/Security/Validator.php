<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->

<?php

//array_push($errMsg, "");
class Validator {

    public $errMsg = array();

    public function __construct() {
        $this->errMsg = array();
    }

    function validateLetterOnly($input) {
        $letterErr = array();
        if (!empty($input)) {
            if (!preg_match("/^[a-zA-Z ]*$/", $input)) {
                array_push($letterErr, "Letter and space only");
            } else {
                //array_push($letterErr, "No error");
            }
        } else {
            array_push($letterErr, "This field is required");
        }
        // Check if any error occured
        if(count($letterErr)>0){
            // An error occured, push error message
            array_push($this->errMsg, $letterErr);
        }
    }
    
    function validateName($input) {
        $letterErr = array();
        if (!empty($input)) {
            if (!preg_match("/^[a-zA-Z ]*$/", $input)) {
                array_push($letterErr, "Name can only have letters and space only");
            } else {
                // No error occured, don't push any errors
                //array_push($letterErr, "No error");
            }
        } else {
            array_push($letterErr, "Name is required");
        }
        
        // Check if any error occured
        if(count($letterErr)>0){
            // An error occured, push error message
            array_push($this->errMsg, $letterErr);
        }
        //print_r($errMsg);
    }

    public function validateEmail($input) {
        $emailErr = array();
        if (!empty($input)) {
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                array_push($emailErr, "Invalid e-mail format(Eg. abc@mail.com)");
            } else {
                //array_push($emailErr, "No error");
            }
        } else {
            array_push($emailErr, "Email is required");
        }
        if(count($emailErr)>0){
            // An error occured
            array_push($this->errMsg, $emailErr);
        }
    }

    public function validateNumOnly($input) {
        $numErr = array();
        if (!empty($input)) {
            if (!preg_match('/^[0-9]*$/', $input)) {
                array_push($numErr, "Number only");
            } else{
                //array_push($numErr, "No error");
            }
        } else {
            array_push($numErr, "This field is required");
        }
        if(count($numErr)>0){
            // An error occured
            array_push($this->errMsg, $numErr);
        }
    }

    public function validateTwoDecimal($input) {
        $decErr = array();
        if (!empty($input)) {
            if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $input)) {
                array_push($decErr, "Number with or without 2 decimal only");
            } else{
                //array_push($decErr, "No error");
            }
        } else {
            array_push($decErr, "This field is required");
        }
        if(count($decErr)>0){
            // An error occured
            array_push($this->errMsg, $decErr);
        }
    }

    public function validatePassword($password, $cPassword) {
        $pasErr = array();
        if (!empty($password) && !empty($cPassword)) {
            if ($password != $cPassword) {
                array_push($pasErr, "Password and confirm password not matched");
            } else {
                //array_push($pasErr, "No error");
            }
        } else {
            if (empty($password)) {
                array_push($pasErr, "Password is required");
            } else if (empty($cPassword)) {
                array_push($pasErr, "Confirm password not matched");
            }
        }
        if(count($pasErr)>0){
            // An error occured
            array_push($this->errMsg, $pasErr);
        }
    }

    public function validatePhone($input) {
        $phoErr = array();
        if (!empty($input)) {
            if (!preg_match('/^[0-9]{10,11}+$/', $input)) {
                array_push($phoErr, "Phone must consist of 10 or 11 digits");
            } else {
                //array_push($phoErr, "No error");
            }
        } else {
            array_push($phoErr, "This field is required");
        }
        if(count($phoErr)>0){
            // An error occured
            array_push($this->errMsg, $phoErr);
        }
    }

    public function customValidate($err) {
        $cusErr = array();
        array_push($cusErr, $err);
        array_push($this->errMsg, $cusErr);
    }

    function getError() {
        return $this->errMsg;
    }

}
