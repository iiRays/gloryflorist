<?php
include "Model/Flower.php";
include "Controllers/Util/DB.php";

//$flower = new Flower();
//$flower->flowerID = "TEST";
//$flower->flowerType = "Stalk";
//$flower->flowerName = "Rose";
//$flower->description = "TESTDesc";
//$flower->price = 123;
//
//$flower->save();

$conn = DB::connectDB();
$sql = $conn->prepare("select * from flower where flowerID = :id");
$id = "TEST";
$sql->bindParam(":id", $id);
$array = DB::selectAsArray($sql, $conn); // get result
$flowerList = DB::arrayToObjectList($array, "Flower"); //conver to object array
echo $flowerList[0]->flowerID;