<?php
/*
  Author: kelvin tham yit hang
 * 1. retrieve today delivery and pickup
 * 2. allow staff to navigate to other date
 * 3. generate report for delivery info 
 */
include_once("XSLTTran_Delivery.php");
require_once("../Controllers/Util/Quick.php");
$style = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Glory Florist : delivery report</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link  rel="stylesheet" href="CSS/deliveryReportStaff.css">
    </head>
    <body>
        <div id='container'>
            <?php Quick::printHeader("deliveryReport(Staff)") ?>
            
            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to staff dashboard</a>
                    <a id='title'>Delivery Report (Staff)</a>
                </div>
            </div>
            
            <div id='content'>
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
            </div>
        </div>
    </body>
</html>