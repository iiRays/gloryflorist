<?php
class Flower {
    private $flowerID;
    private $flowerType;
    private $flowerName;
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
    
    public function save(){
        $conn = DB::connectDB();
            
        $sql = $conn->prepare("INSERT INTO flower VALUES (:flowerID, :flowerType, :flowerName, :description, :price)");
        
        if(!$sql)
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        
        $sql->bindParam(":flowerID", $this->flowerID);
        $sql->bindParam(":flowerType", $this->flowerType);
        $sql->bindParam(":flowerName", $this->flowerName);
        $sql->bindParam(":description", $this->description);
        $sql->bindParam(":price", $this->price);
        $sql->execute();
        
       
       
       $conn = null;
    }
}
