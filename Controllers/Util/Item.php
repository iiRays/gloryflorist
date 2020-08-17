<?php

class Item {
    public $arrangement;
    public $quantity;
    
    function __construct($arrangement, $quantity){
        $this->arrangement = $arrangement;
        $this->quantity = $quantity;
    }
}
