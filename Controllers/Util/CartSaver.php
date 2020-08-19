<?php

require_once("../Controllers/Security/Session.php");

// memento design pattern: https://refactoring.guru/design-patterns/memento/php/example

class CartSaver {
    
    public $cartMemento;
    
    public function __construct() {
        $this->cartMemento = new Cart();
    }
    
    public function backup($cart) {
        $this->cartMemento = $cart;
    }
    
    public function save() {
        Session::set("cartSaver", $this);
    }
    
    public function restoreCart() {
        Session::set("cart", $this->cartMemento);
        
        $this->cartMemento = new Cart();
        $this->save();
    }
    
}
