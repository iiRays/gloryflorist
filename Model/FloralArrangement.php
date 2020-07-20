<?php

class FloralArrangement {
    private $floralArrangementID;
    private $arrangementCost;
    private $wrapColor;
    private $flowerItemCollection; //List of flowers used, FK
    
     //Getter and setters
    public function __get($field) {
        if ($field == "flowerItemCollection") {
            return $this->getFlowerItemCollection();
        }

        return $this->$field;
    }
    
    public function __set($field, $data){
        if(property_exists($this, $field)){
            $this->$field = $data;
        }
    }
    
    //Load foreign key results
    public function getFlowerItemCollection(){
        $conn = DB::connectDB();
        $sql = $conn->prepare("select * from flowerItem where floralArrangementID = :floralArrangementID");
        $sql->bindParam(":floralArrangementID", $this->floralArrangementID);
        $result = DB::get($sql, $conn, "FlowerItem");
        $conn = null;
        return $result;
    }
    
    // Save to database
    public function save(){
        $conn = DB::connectDB();
            
        $sql = $conn->prepare("INSERT INTO floralarrangement VALUES (:floralArrangementID, :arrangementCost, :wrapColor)");
        
        if(!$sql)
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        
        $sql->bindParam(":floralArrangementID", $this->floralArrangementID);
        $sql->bindParam(":arrangementCost", $this->arrangementCost);
        $sql->bindParam(":wrapColor", $this->wrapColor);
        $sql->execute();
        
       $conn = null;
    }
}
