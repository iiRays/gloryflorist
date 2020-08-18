<?php

class CartItem {
    public $name;
    public $quantity;
    public $price;
    
    function __construct($name, $quantity, $price) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }
}
