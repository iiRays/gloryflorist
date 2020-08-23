<?php
require_once(__DIR__."/../Security/Session.php");
require_once(__DIR__."/../Util/MementoSaver.php");

// memento design pattern: https://refactoring.guru/design-patterns/memento/php/example

class CartSaver implements MementoSaver {
    
    public $cartMemento;
    
    public function __construct() {
        $this->cartMemento = new CartAdapter();
    }
    
    public function backup($cartAdapter) {
        $this->cartMemento = $cartAdapter;
        $this->save();
    }
    
    public function save() {
        Session::set("cartSaver", $this);
    }
    
    public function restore() {
        Session::set("cartAdapter", $this->cartMemento);
        
        $this->cartMemento = new CartAdapter();
        $this->save();
    }
    
}
