<?php

interface CartInterface {
    public function getCart();
    public function setCart($cart);
    public function getItems();
    public function setItems($items);
    public function addItem($id, $quantity);
    public function removeItem($index);
    public function itemExists($id);
    public function makeOrder($grandTotal, $status);
    public function save();
    public function restore();
    public function backup();
}
