<?php

include __DIR__."/../Util/Item.php";
require_once(__DIR__."/../Security/Session.php");

class Cart {
    public $items = [];
    
    public function addItem($id, $quantity) {
        $arrangement = R::load('arrangement', $id);
        $item = new Item($arrangement, $quantity);
        $this->items[] = $item;
    }
    
    public function removeItem($index) {
        unset($this->items[$index]);
    }
    
    public function itemExists($id) {
        foreach ($this->items as $item) {
            if ($item->arrangement->id == $id) {
                return true;
            }
        }
        return false;
    }
    
    public function makeOrder($grandTotal, $status) {
        // add order
        $user = Session::get("user");
        $delivery = Session::get("delivery");
        
        $order = R::dispense("orders");
        $order->customer_id = $user->id;
        $order->grand_total = $grandTotal;
        //$order->delivery_address = $deliveryAddress;
        $order->status = $status;
        //$order->targetDate = $targetDate;
        $order->delivery = $delivery;
        R::store($order);
        
        // add order items
        foreach ($this->items as $item) {
            $orderItem = R::dispense("orderitem");
            $orderItem->quantity = $item->quantity;
            $orderItem->arrangement_id = $item->arrangement->id;
            $orderItem->order_id = $order->id;
            R::store($orderItem);
        }
    }
    
    public function save() {
        Session::set("cart", $this);
    }
}
