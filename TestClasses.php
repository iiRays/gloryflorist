<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Food
 *
 * @author mast3
 */
class Food {
    private $itemCode;
    private $description;
    private $price;
    private $unit;
    
    function __construct($itemCode, $description, $price, $unit){
        $this->itemCode = $itemCode;
        $this->description = $description;
        $this->price = $price;
        $this->unit = $unit;
    }
    
    // Getters and setters
    
    function getItemCode() {
        return $this->itemCode;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrice() {
        return $this->price;
    }

    function getUnit() {
        return $this->unit;
    }

    function setItemCode($itemCode) {
        $this->itemCode = $itemCode;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setWeight($unit) {
        $this->unit = $unit;
    }


}

class Stationery {
    private $itemCode;
    private $description;
    private $price;
    private $weight;
    
    function __construct($itemCode, $description, $price, $weight){
        $this->itemCode = $itemCode;
        $this->description = $description;
        $this->price = $price;
        $this->weight = $weight;
    }
    
    //Getters and setters
    function getItemCode() {
        return $this->itemCode;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrice() {
        return $this->price;
    }

    function getWeight() {
        return $this->weight;
    }

    function setItemCode($itemCode) {
        $this->itemCode = $itemCode;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setWeight($weight) {
        $this->weight = $weight;
    }
}

class Subject{
    private $code;
    private $title;
    private $credit;
    private $yearOfStudy;
    
    

    //Setters and getters
    public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }


}