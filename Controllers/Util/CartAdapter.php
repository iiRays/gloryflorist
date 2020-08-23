<?php

require_once ("CartInterface.php");
require_once ("Cart.php");

class CartAdapter implements CartInterface {
    private $cart;
    
    public function __construct() {
        $this->cart = new Cart();
    }
    
    public function getCart() {
        return $this->cart;
    }
    
    public function setCart($cart) {
        $this->cart = $cart;
    }
    
    public function getItems() {
        return $this->cart->getItems();
    }
    
    public function setItems($items) {
        $this->cart->setItems($items);
    }
    
    public function addItem($id, $quantity) {
        $this->cart->addItem($id, $quantity);
    }
    
    public function removeItem($index) {
        $this->cart->removeItem($index);
    }
    
    public function itemExists($id) {
        return $this->cart->itemExists($id);
    }
    
    public function makeOrder($grandTotal, $status) {
        $this->cart->makeOrder($grandTotal, $status);
    }
    
    public function save() {
        Session::set("cartAdapter", $this);
    }
    
    public function restore() {
        $cartSaver = Session::get("cartSaver");
        $cartSaver->restore();
    }
    
    public function backup() {
        $cartSaver = Session::get("cartSaver");
        $cartSaver->backup($this);
        Session::set("cartSaver", $cartSaver);
    }
}
