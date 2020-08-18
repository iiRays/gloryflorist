<!DOCTYPE html>
<?php
/*
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("staff");
 * 
 */
?>
<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

//$id = $_GET['id'];
$id = 1;
$sql = "select * from flower where id = " . $id;

$flower = R::getRow($sql);

$results = array();

foreach ($flower as $item) {
    $results[] = $item;
}

$name = $results[1];
$remark = $results[2];
$imgSrc = $results[3];
$isAvailable = $results[4];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/flower.css">
        <title>Glory Florist : Flower</title>
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

            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>Flower</a>
                </div>
            </div>

            <div id='content'>
                <div id="flower">
                    <?php echo "<img id='flowerImg' src='" . $imgSrc . "'alt='flower'/>"; ?>
                    <br/>
                    <label>Name</label><br/>
                    <label class="details"><?php echo $name; ?></label><br/>
                    <label>Remarks</label><br/>
                    <label class="details"><?php echo $remark; ?></label><br/>
                    <label>
                        <?php
                        if ($isAvailable == "true") {
                            echo "Available for Floral Arrangement";
                        } else {
                            echo "Not available for Floral Arrangement";
                        }
                        ?>
                    </label><br/>
                </div>
            </div>
            <div id="bottom">
                <a href='#' id='edit_button'>Edit</a>
            </div>
        </div>
    </body>

</html>     

