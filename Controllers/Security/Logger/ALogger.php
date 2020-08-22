<?php
/*
  Author: kelvin tham yit hang
  */

abstract class ALogger {
  
  function __construct() {
  }
  
  public function validLogger($extra,$fileinfo) {
  }
  
  public function invalidLogger($e,$fileinfo){    
  }
}