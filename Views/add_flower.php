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


$name = $_POST['name'];
$remark = $_POST['remark'];
$imgLink = $_POST['flowerImgSrc'];

if(!empty($_POST['isAvailable'])){
    $isAvailable = "true";
}else{
    $isAvailable = "false";
}

$flower = new FlowerAdapter();
$flower->addData($name, $remark, $imgLink, $isAvailable);

/*
$flower = R::dispense("flower");
$flower->flowerName = $name;
$flower->remark = $remark;
$flower->img = $imgLink;
$flower->isAvailable = $isAvailable;
R::storeAll([$flower]);
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
        <title>Glory Florist : Added Successful</title>
    </head>

    <body>
        <div id='container'>

            <?php Quick::printHeader("staffDashboard") ?>                

            <div id='content'>
                <div id="msgBorder">
                    <label>The new flower had been created successfully</label>
                </div>
                
            </div>
            <a href="viewFlower%28Staff%29.php" id="back_button">Back</a>
        </div>
    </body>
</html>




