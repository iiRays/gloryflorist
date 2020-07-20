<?php
class FlowerItem {
    private $flowerItemID;
    private $quantity;
    private $flowerID; //Related to flower from flower Table
    private $flowerArrangementID; //Related to flowerArrangement from 
    private $flower; //FK object
    
     //Getter and setters
    public function __get($field) {
         if ($field == "flower") {
            return $this->getFlower();
        }
        return $this->$field;
    }
    
    public function __set($field, $data){
        if(property_exists($this, $field)){
            $this->$field = $data;
        }
    }
    
     //Load foreign key results
    public function getFlower(){
        $conn = DB::connectDB();
        $sql = $conn->prepare("select * from flower where flowerID = :flowerID");
        $sql->bindParam(":flowerID", $this->flowerID);
        $result = DB::get($sql, $conn, "Flower");
        $conn = null;
        return $result[0]; //Return first result only, as one flowerItem only can have one flower
    }
    
    
    public function save(){
        $conn = DB::connectDB();
            
        $sql = $conn->prepare("INSERT INTO flowerItem VALUES (:flowerItemID, :flowerID, :floralArrangementID, :quantity)");
        
        if(!$sql)
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        
        $sql->bindParam(":flowerItemID", $this->flowerItemID);
        $sql->bindParam(":flowerID", $this->flowerID);
        $sql->bindParam(":floralArrangementID", $this->floralArrangementID);
        $sql->bindParam(":quantity", $this->quantity);
        $sql->execute();
        
       
       
       $conn = null;
    }
}

