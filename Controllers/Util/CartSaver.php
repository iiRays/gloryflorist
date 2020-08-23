<?php
require_once(__DIR__."/../Security/Session.php");
require_once(__DIR__."/../Util/MementoSaver.php");

// memento design pattern: https://refactoring.guru/design-patterns/memento/php/example

class CartSaver implements MementoSaver {
    
    public $cartMemento;
    
    public function __construct() {
        $this->cartMemento = new Cart();
    }
    
    public function backup($cart) {
        $this->cartMemento = $cart;
        $this->save();
    }
    
    public function save() {
        Session::set("cartSaver", $this);
    }
    
    public function restore() {
        Session::set("cart", $this->cartMemento);
        
        $this->cartMemento = new Cart();
        $this->save();
    }
    
}
