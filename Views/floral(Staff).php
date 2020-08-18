<?php
/*
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("staff");
 * 
 */
?>
<!DOCTYPE html>
<?php
include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

$id = $_GET['id'];
//$id = 1;
$sql = "select * from arrangement where id = " . $id;

$arrangement = R::getRow($sql);

$results = array();

foreach ($arrangement as $item) {
    $results[] = $item;
}

$name = $results[1];
$price = $results[2];
$isAvailable = $results[3];
$imgSrc = $results[4];
$stalk = $results[5];
$flower = $results[6];

$sql = "select flower.flower_name from arrangement, flower where arrangement.flower_id = flower.id and  arrangement.flower_id = " . $results[6];

$flowers = R::getRow($sql);

foreach ($flowers as $item) {
    $results[] = $item;
}
$flowerName = $results[7];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/floral.css">
        <title>Glory Florist : Floral</title>
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
                    <a id='title'>Floral Arrangement</a>
                </div>
            </div>

            <div id='content'>
                <div id="floral">
                    <?php echo "<img id='flowerImg' src='" . $imgSrc . "'alt='flower'/>"; ?>
                    <br/>
                    <label>Name</label><br/>
                    <label class="details"><?php echo $name; ?></label><br/>
                    <div id="left">
                        <label>Flower</label>
                        <label class="details"><?php echo $flowerName; ?></label>
                    </div>
                    <div id="right">
                        <label>Stalks</label>
                        <label class="details"><?php echo $stalk; ?></label>
                    </div>
                    <div id="bottomContent">
                        <label>Price</label><br/>
                        <label class="details"><?php echo $price; ?></label><br/>
                        <label>
                            <?php
                            if ($isAvailable == "true") {
                                echo "Available for Sell";
                            } else {
                                echo "Not available for Sell";
                            }
                            ?>
                        </label><br/>
                    </div>
                </div>
            </div>
            <div id="bottom">
                <a href='editFloral%28Staff%29.php?id= <?php echo $id; ?>' id='edit_button'>Edit</a>
            </div>
        </div>
    </body>

</html>     

