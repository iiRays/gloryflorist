<?php

interface CartInterface {
    public function addItem($id, $quantity);
    public function removeItem($index);
    public function itemExists($id);
    public function makeOrder();
    public function save();
    public function restore();
    public function backup();
}
