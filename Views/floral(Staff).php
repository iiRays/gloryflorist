<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->
<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("staff");
?>
<!DOCTYPE html>
<?php
//include "../Controllers/Util/rb.php";
//include "../Controllers/Util/DB.php";
include '../Controllers/Util/Floral/FloralArrangementAdapter.php';
require_once("../Controllers/Util/Quick.php");

//DB::connect();

$id = $_GET['id'];
//$id = 1;

$floral= new FloralArrangementAdapter();

$imgSrc = $floral->getImgSrc($id);
$name = $floral->getName($id);
$price = $floral->getPrice($id);
$flowerName = $floral->getFlowerName($id);
$stalk = $floral->getStalks($id);
$isAvailable = $floral->getAvailability($id);

//$sql = "select * from arrangement where id = " . $id;
//
//$arrangement = R::getRow($sql);
//
//$results = array();
//
//foreach ($arrangement as $item) {
//    $results[] = $item;
//}
//
//$name = $results[1];
//$price = $results[2];
//$isAvailable = $results[3];
//$imgSrc = $results[4];
//$stalk = $results[5];
//$flower = $results[6];
//
//$sql = "select flower.flower_name from arrangement, flower where arrangement.flower_id = flower.id and  arrangement.flower_id = " . $results[6];
//
//$flowers = R::getRow($sql);
//
//foreach ($flowers as $item) {
//    $results[] = $item;
//}
//$flowerName = $results[7];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/floral(Staff).css">
        <title>Glory Florist : Flower Arrangement</title>
    </head>

    <body>
        <div id='container'>

            <?php Quick::printHeader("staffDashboard") ?>

            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>Flower Arrangement</a>
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
                        <label class="details"><?php echo 'RM ' . number_format($price, 2); ?></label><br/>
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

