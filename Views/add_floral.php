<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->
<?php

//include "../Controllers/Util/rb.php";
//include "../Controllers/Util/DB.php";
require_once ('../Controllers/Util/Floral/FloralArrangementAdapter.php');
require_once("../Controllers/Util/Quick.php");

//DB::connect();

$name = $_POST['name'];
$stalk = $_POST['stalk'];
$flowerId = $_POST['flowers'];
$price = doubleval($_POST['price']);
$imgLink = $_POST['flowerImgSrc'];

$floral= new FloralArrangementAdapter();
$floral->addData($name, $price, $stalk, $imgLink, $flowerId);

//$flowers = R::load("flower", $flowerId);
//$isAvailable = $flowers->isAvailable;
//
//$arrangement = R::dispense("arrangement");
//$arrangement->name = $name;
//$arrangement->price = $price;
//$arrangement->isAvailable = $isAvailable;
//$arrangement->img = $imgLink;
//$arrangement->flower_id = $flowerId;
//$arrangement->stalks = $stalk;
//R::storeAll([$arrangement]);
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
                    <label>The new flower arrangement had been created </label>
                </div>
                
            </div>
            <a href="viewFloral%28Staff%29.php" id="back_button">Back</a>
        </div>
    </body>
</html>

