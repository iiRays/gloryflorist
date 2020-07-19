<?php
class FlowerItem {
    private $flowerItemID;
    private $flower; //Related to flower from flower Table
    private $flowerArrangement; //Related to flowerArrangement from 
    private $description;
    private $price;
    
    //Getter and setters
    public function __get($field) {
        return $this->$field;
    }
    
   public function __set($field, $data){
        if(property_exists($this, $field)){
            $this->$field = $data;
        }
    }
    
    //Generate insert 
}

