<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->
<?php

//include "../Controllers/Util/rb.php";
//include "../Controllers/Util/DB.php";
require_once ('../Controllers/Util/Flower/FlowerAdapter.php');
require_once("../Controllers/Util/Quick.php");

//DB::connect();

$id = $_POST['id'];
$name = $_POST['name'];
$remark = $_POST['remark'];
$imgLink = $_POST['flowerImgSrc'];

if (!empty($_POST['isAvailable'])) {
    $isAvailable = "true";
} else {
    $isAvailable = "false";
}

$flower = new FlowerAdapter();
$flower->editName($id, $name);
$flower->editImgSrc($id, $imgLink);
$flower->editRemarks($id, $remark);
$flower->editAvailability($id, $isAvailable);
/*
$flower = R::load("flower", $id);
$flower->flowerName = $name;
$flower->remark = $remark;
$flower->img = $imgLink;
$flower->isAvailable = $isAvailable;

R::storeAll([$flower]);

$sql = "select * from arrangement where flower_id = " . $id;

$arrangement = R::getAll($sql);

$results = array();

foreach ($arrangement as $items) {
    foreach ($items as $item) {
        $results[] = $item;
    }
}
end($results);
$key = key($results);
for ($x = 0; $x <= $key; $x += 7) {
    $floralId = $results[$x];

    $arrangement = R::load("arrangement", $floralId);

    if ($isAvailable == "true") {
        $floralIsAvailable = "true";
    } else {
        $floralIsAvailable = "false";
    }
    $arrangement->isAvailable = $floralIsAvailable;
    R::storeAll([$arrangement]);
}
 * 
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/successfulDisplay.css">
        <title>Glory Florist : Edited Successful</title>
    </head>

    <body>
        <div id='container'>

            <?php Quick::printHeader("staffDashboard") ?>    

            <div id='content'>
                <div id="msgBorder">
                    <label>The flower had been updated successfully</label>
                </div>
                
            </div>
            <a href="viewFlower%28Staff%29.php" id="back_button">Back</a>
        </div>
    </body>
</html>


