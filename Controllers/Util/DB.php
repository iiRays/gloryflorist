<?php

class DB {

    // Connection
    public static function connectDB() {
        // Database connection settings
        $username = "root";
        $password = "";
        $dbName = "collegedb";

        // Establish connection
        $conn = new mysqli("localhost", $username, $password, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public static function disconnectDB($conn) {
        $conn->close();
    }

    // CRUD
    public static function insert($object) {
        $conn = $this::connectDB();

        //For this to work, object MUST have a "generate insert statement".
        $sql = $object->generateInsert();

        //Ensure successful
        if ($conn->query($sql) === TRUE) {
            //Successful
            return true;
        } else {
            //Error occured
            return $conn->error;
        }

        DB::disconnectDB($conn);
    }

    // Returns data as associative array
    // eg. resultArray[0]['name'] refers to the first result's "name" column.
    public static function selectAsArray($sql) {
        $conn = DB::connectDB();

        $result = $conn->query($sql);
        $resultArray = array();

        //Store results in array
        // Code is possible thanks to https://stackoverflow.com/questions/26191873/how-to-store-data-as-an-associative-array-from-mysql-database-in-php
        while ($row = $result->fetch_assoc()) {
            array_push($resultArray, $row);
            
        }

        DB::disconnectDB($conn);

        return $resultArray;
    }
    
    //Returns data as an object
    public static function select($sql, $className){
        $results = self::select($sql);
        $objects = array();
        
        foreach($results as $item){
            
            array_push($objects, self::arrayToObject($item, $className));
        }
        return $objects;
    }

    //Converts array to an object
    public static function arrayToObject($item, $className) {
            $object = new $className(); //Creates the object based on className

            foreach ($item as $key => $value) {
                
                // Set's the array's key value to object's property (name = array key) 
                // Ensure that the sql result column (or array key) is the SAME as object's attribute name (eg. customer.custID = array['custID']
                // Eg. array['name'] will be set to customer.name
                $object->$key = $value;
               
            }
        
        return $object;
    }
    
    


}
