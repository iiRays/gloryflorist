<?php

class DB {

    // Connection
    public static function connectDB() {
        // Database connection settings
        $username = "root";
        $password = "";
        $dbName = "flowerdb";

        // Establish connection
        $conn = new PDO("mysql:host=localhost;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        return $conn;
    }

    public static function disconnectDB($conn) {
        $conn->close();
    }

    // CRUD
    public static function insert($object) {
        $conn = DB::connectDB();

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
    public static function selectAsArray($sql, $conn) {
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function selectByID($id, $class) {
        $conn = DB::connectDB();
        $sql = $conn->prepare('SELECT * FROM :tableName WHERE id = :id');



        if (!$sql)
            die('prepare() failed: ' . htmlspecialchars($conn->error));

        $sql->bindParam(":tableName", $class);
        $sql->bindParam(":id", $id);

        $conn = null;

        return $sql->fetchObject($class);
    }

    // Fetch data from database as objects
    public static function get($sql, $conn, $className) {
        return DB::arrayToObjectList(DB::selectAsArray($sql, $conn), $className);
    }

    //Returns data as an object
    public static function select($sql, $className) {
        $results = self::selectAsArray($sql);
        $objects = array();

        foreach ($results as $item) {

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

    //Converts array with many subarrays to an object list
    public static function arrayToObjectList($array, $className) {
        $resultArray = array();


        foreach ($array as $item) {
            $object = new $className(); //Creates the object based on className
            foreach ($item as $key => $value) {

                // Set's the array's key value to object's property (name = array key) 
                // Ensure that the sql result column (or array key) is the SAME as object's attribute name (eg. customer.custID = array['custID']
                // Eg. array['name'] will be set to customer.name
                $object->$key = $value;
            }

            array_push($resultArray, $object);
        }

        return $resultArray;
    }

  

}
