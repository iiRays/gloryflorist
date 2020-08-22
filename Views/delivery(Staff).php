<?php
/*
  Author: kelvin tham yit hang
 * 1. retrieve today delivery and pickup
 * 2. allow staff to navigate to other date
 * 3. generate report for delivery info 
 */
require_once("XSLTTran_Delivery.php");
require_once("../Controllers/Util/Quick.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Glory Florist : delivery list</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link  rel="stylesheet" href="CSS/">
    </head>
    <body>
        <div id='container'>
            <?php Quick::printHeader("staffDashboard") ?>
            <ol>
                <!--For self entry delivery or pickup -->
                <li><a href="../Views/delivery.php">Create New Delivery or Pickup</a></li>
                <li><a href="../Views/deliveryReport(Staff).php">View Delivery and Pickup summary report</a></li>
                <li><a href="../Views/delivery(Staff).php" name="list">View Delivery list</a></li>
            </ol>
            <!-- Display today delivery and pickup -->
            <div>
                <form method="post" action="delivery(Staff).php">
                    <label>Select a date and click "go" to view the delivery list</label>
                    <input type="date" name="date" 
                           value="">
                    <button >Go</button>
                </form>
            </div>
            <?php
            //call here..
            $header = "<h1>Delivery List</h1>"
                    . "<h3>For Date: " . Quick::getPostData("date") . "</h3>"
                    . "<h4>Please deliver the flower to our beloved one, and Ensure them pickup their flower Ya. </h4>";
            echo $header;
            $deliveryList = new XSLTTransformation("deliveries.xml", "delivery_list_on_date.xsl");
            ?>
        </div>
    </body>
</html>