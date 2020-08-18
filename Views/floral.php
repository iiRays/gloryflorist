<!DOCTYPE html>
<?php
include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

//$id = $_GET['id'];
$id = 1;
$sql = "select * from arrangement where id = " . $id;

$arrangement = R::getRow($sql);

$results = array();

foreach ($arrangement as $item) {
    $results[] = $item;
}
print_r($results);

$name = $results[1];
$stalk = $results[4];
$price = $results[2];
$imgSrc = $results[3];
$isAvailable = $results[5];
$flowers = $results[6];
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
                    <a id='title'>Floral</a>
                </div>
            </div>

            <div id='content'>
                <div id="floral">
                    <?php echo "<img id='flowerImg' src='" . $imgSrc . "'alt='flower'/>"; ?>
                    <br/>
                    <label>Name</label><br/>
                    <label class="details">a</label><br/>
                    <div id="left">
                        <label>Flowers</label>
                        <label class="details">a</label>
                    </div>
                    <div id="right">
                        <label>Stalks</label>
                        <label class="details">a</label>
                    </div>
                    <div id="bottomContent">
                        <label>Price</label><br/>
                        <label class="details">a</label><br/>
                        <label>Available
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
            </div>
            <div id="bottom">
                <a href='#' id='edit_button'>Edit</a>
            </div>
        </div>
    </body>

</html>     

