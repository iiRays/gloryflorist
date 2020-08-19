<?php

include "../Controllers/Util/Item.php";
require_once("../Controllers/Security/Session.php");

class Cart {
    public $items = [];
    
    public function addItem($id, $quantity) {
        $arrangement = R::load('arrangement', $id);
        $item = new Item($arrangement, $quantity);
        $this->items[] = $item;
    }
    
    public function makeOrder() {
        // add order
        $order = R::dispense("orders");
        $order->grand_total = 69.00;
        $order->delivery_address = "my house";
        $order->status = "pending";
        $order->targetDate = date_create("2020-07-28 20:00");
        R::store($order);
        
        // add order items
        foreach ($this->items as $item) {
            $orderItem = R::dispense("orderitem");
            $orderItem->quantity = $item->quantity;
            $orderItem->arragement_id = $item->arrangement->id;
            $orderItem->order_id = $order->id;
            R::store($orderItem);
        }
    }
    
    public function save() {
        Session::set("cart", $this);
    }
}
