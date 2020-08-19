<?php
/*
require_once 'Validator.php';

$validator = new Validator();



/*
  public function showError($input) {
  if($input == 0){
  echo '<script>alert("Something is wrong in the form");</script>';
  }else{
  echo '<script>alert("No error found");</script>';
  }
  }

  public function validateLetterOnly($input) {
  if (!empty($input)) {
  if (!preg_match("/^[a-zA-Z ]*$/", $input)) {
  return 0;
  } else {
  return 1;
  }
  } else {
  return 0;
  }
  }

  public function validateEmail($input) {
  if (!empty($input)) {
  if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
  return 0;
  } else {
  return 1;
  }
  } else {
  return 0;
  }
  }

  public function validateNumOnly($input) {
  if (!empty($input)) {
  if (!preg_match('/^[0-9]*$/', $input)) {
  return 0;
  } else {
  return 1;
  }
  } else {
  return 0;
  }
  }

  public function validateTwoDecimal($input) {
  if (!empty($input)) {
  if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $input)) {
  return 0;
  } else {
  return 1;
  }
  } else {
  return 0;
  }
  }

  public function validatePassword($password, $cPassword) {
  if (!empty($password) && !empty($cPassword)) {
  if ($password != $cPassword) {
  return 0;
  } else {
  return 1;
  }
  } else {
  return 0;
  }
  }

  public function validatePhone($input) {
  if (!empty($input)) {
  if (!preg_match('/^[0-9]{10,11}+$/', $input)) {
  return 0;
  } else {
  return 1;
  }
  }else {
  return 0;
  }
  }
 }
 * 
 */

