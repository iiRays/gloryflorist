<?php

class Orders{
    private $orderID;
    private $userID;
    private $grandTotal;
    private $datePaid;
    private $isDelivery;
    private $deliveryAddress;
    private $deliveryFee;
    private $cardMessage;
    private $recipientName;
    private $recipientContact;
    private $targetDate;
    private $status;
    
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
            
        $sql = $conn->prepare("INSERT INTO Orders VALUES (:orderID, :userID, :grandTotal, :datePaid, :isDelivery, :deliveryAddress, :deliveryFee, :cardMessage, :recipientName, :recipientContact, :targetDate, :status)");
        
        if(!$sql)
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        
        $sql->bindParam(":orderID", $this->orderID);
        $sql->bindParam(":userID", $this->userID);
        $sql->bindParam(":grandTotal", $this->grandTotal);
        $sql->bindParam(":datePaid", $this->datePaid);
        $sql->bindParam(":isDelivery", $this->isDelivery);
         $sql->bindParam(":deliveryAddress", $this->deliveryAddress);
        $sql->bindParam(":deliveryFee", $this->deliveryFee);
        $sql->bindParam(":cardMessage", $this->cardMessage);
        $sql->bindParam(":recipientName", $this->recipientName);
        $sql->bindParam(":recipientContact", $this->recipientContact);
        $sql->bindParam(":targetDate", $this->targetDate);
        $sql->bindParam(":status", $this->$status);
        $sql->execute();
       
       $conn = null;
    }
}