<?php
require_once("../Controllers/Security/Authorize.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Util/Quick.php");
Authorize::onlyAllow("staff");
DB::connect();

// Get order count
$orderCount = count(R::find("orders", "status != ? AND status != ?", ["done", "dropped"]));
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Staff Dashboard</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/staffDashboard.css">
    </head>
    <body>
        <div id='container'> <!-- <form id='container'> ??? -->

            <?php Quick::printHeader("staffDashboard") ?>

            <div id='top'>
                <div id='text'>
                    <a href='#' id='back'>back &nbsp; to &nbsp; the shop</a>
                    <a id='title'>Staff Dashboard</a>
                </div>
            </div>
            <div id="content">
                <div id="left">
                    <div class="item" id="order">
                        View orders
                        <div id="counter"><?php echo $orderCount > 0 ? $orderCount : ""; // Show order count only if more than 0 ?></div>
                    </div>
                    <br/><br/><br/>
                    <?php
                    if (Authorize::isUserA("admin")) {

                        echo '<div class="item" id="staff">Manage staff</div>';
                    }
                    ?>
                </div>
                <div id="right">
                    <div class="item" id="arrangement">
                        Manage arrangements
                    </div>
                    <br/><br/><br/>
                    <div class="item" id="flower">
                        Manage flowers
                    </div>
                </div>
                <br>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#order").click(function () {
            window.location.href = "staffOrders.php";
        });
        $("#staff").click(function () {
            window.location.href = "viewStaff.php";
        });
        $("#arrangement").click(function () {
            window.location.href = "viewFloral%28Staff%29.php";
        });
        $("#flower").click(function () {
            window.location.href = "viewFlower%28Staff%29.php";
        });
    </script>
</html>

