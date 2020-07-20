<?php
include "Model/FloralArrangement.php";
include "Controllers/Util/DB.php";

//$flower = new Flower();
//$flower->flowerID = "TEST";
//$flower->flowerType = "Stalk";
//$flower->flowerName = "Rose";
//$flower->description = "TESTDesc";
//$flower->price = 123;
//
//$flower->save();

//I want get floral arrangement
$conn = DB::connectDB();
$sql = $conn->prepare("select * from floralArrangement where floralArrangementID = :id");
$id = "Test";
$sql->bindParam(":id", $id);
$result = DB::get($sql, $conn, "FloralArrangement");

//I want to know what flowers are used
echo ($result[0]->flowerItemCollection[0]->flower->flowerName);