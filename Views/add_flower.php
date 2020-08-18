<?php
include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

$name = $_POST['name'];
$remark = $_POST['remark'];
$imgLink = $_POST['flowerImgSrc'];

if(!empty($_POST['isAvailable'])){
    $isAvailable = "true";
}else{
    $isAvailable = "false";
}

$flower = R::dispense("flower");
$flower->flowerName = $name;
$flower->remark = $remark;
$flower->img = $imgLink;
$flower->isAvailable = $isAvailable;
R::storeAll([$flower]);

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

            <div id='hotbar'>
                <a href='#' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='#' class='link'>cart</a>
                <a href='#' class='link'>account</a>
                <a href='#' class='link' id='currentLink'>dashboard</a>
            </div>

            

            <div id='content'>
                <div id="msgBorder">
                    <label>The new flower had been created successfully</label>
                </div>
                
            </div>
            <a href="viewFlower%28Staff%29.php" id="back_button">Back</a>
        </div>
    </body>
</html>




