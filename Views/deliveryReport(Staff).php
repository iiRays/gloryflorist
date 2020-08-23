<?php
/*
  Author: kelvin tham yit hang
 * 1. retrieve today delivery and pickup
 * 2. allow staff to navigate to other date
 * 3. generate report for delivery info 
 */
include_once("XSLTTran_Delivery.php");
require_once("../Controllers/Util/Quick.php");
require_once __DIR__ . '\..\Controllers\Security\Authorize.php';
Authorize::onlyAllow("staff"); //temperory disable for better coding envir
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Glory Florist :</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link  rel="stylesheet" href="CSS/">
    </head>
    <body>
        <ol>
            <!--For self entry delivery or pickup -->
            <li><a href="../Views/delivery.php">Create New Delivery or Pickup</a></li>
            <li><a href="../testFiles/deliveryReport(Staff).php">View Delivery and Pickup summary report</a></li>
            <li><a href="../testFiles/delivery(Staff).php" name="list">View Delivery list</a></li>
        </ol>
        <!-- Display today delivery and pickup -->
        <div>
            <form method="post" action="deliveryReport(Staff).php">
                <label>Select date range and click "go" to view the Delivery Summary Report</label>
                <input type="date" name="start" value="">
                <input type="date" name="end" value="">
                <button >Go</button>
            </form>
        </div>
        <?php
        $header = "<h1>Delivery Summary Report</h1>"
                . "<h3>For Date   : " . Quick::getPostData("start") . " util " . Quick::getPostData("end") . "</h3>"
                . "<h4>Prepared by: </h4>";
        echo $header;

        $sr = new XSLTTransformation("deliveries.xml", "delivery_summary_report.xsl");
        ?>
    </body>
</html>