<?php
// Author: Johann Lee Jia Xuan

//To handle uncaught errors
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';
$logger = new LoggerFactory;
$logger = $logger->createLogger("UNCAUGHTERROR");
$logger->invalidLogger(null, null);


require_once("../Controllers/Security/Authorize.php");
require_once("../Controllers/Util/Quick.php");
Authorize::onlyAllow("staff");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : View Orders</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/staffOrders.css">
    </head>
    <body>
        <div id='container'> <!-- <form id='container'> ??? -->

            <?php Quick::printHeader("staffDashboard") ?>

            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>View Orders</a>
                    <div class="message" style="font-size: 35; margin: auto; text-align: center;"></div>
                </div>
            </div>

            <div id="content">

                <br/>


                <?php
                require_once "../Controllers/Util/DB.php";

                DB::connect();
                // Get orders
                $orderList = R::find("orders", "order by field(status,'pending', 'doing','dropped','done')");
                $order = "";

                echo '<div class="masonryContainer">';

                foreach ($orderList as $individualOrder) {

                    // Load all data
                    $id = $individualOrder->id;

                    // Display deadline
                    if ($individualOrder->delivery != null) {
                        date_default_timezone_set('Asia/Singapore');
                        $now = Quick::getCurrentTime();
                        $timeslot = $individualOrder->delivery->timeslot;
                        $deadlineDate = new DateTime(date('Y-m-d H:i:s', strtotime($individualOrder->delivery->date)));
                        $deadlineDate->add(new DateInterval("PT" . substr($timeslot, 0, 2) . "H" . substr($timeslot, 3, 2) . "M"));
                        $deadlineDateStr = date_format($deadlineDate, "d/m/y h:ia");
                        $deadline = date_diff($now, $deadlineDate, false)->format(" %r%dd %hh %im left");

                        if (strpos($deadline, "-") > 0 && $individualOrder->status != "done" && $individualOrder->status != "dropped") {
                            // Overdue
                            $deadline = "Overdue";
                        }
                    } else {
                        $deadlineDateStr = "No deadline given";
                        $deadline = "No deadline given";
                    }

                    // If finished and over deadline now
                    if ($individualOrder->status == "done" || $individualOrder->status == "dropped") {
                        $deadline = "";
                    }

                    //Get order item
                    $orderItemList = R::find("orderitem", "order_id = ?", [$id]);
                    $count = count($orderItemList);
                    $finishedClass = $individualOrder->status == "done" || $individualOrder->status == "dropped" ? "finished" : "";  // marked completed ones

                    $order .= "<div class=\"item {$finishedClass}\" id=\"{$id}\" data-arrangementcount=\"{$count}\" data-targetdate=\"Target: {$deadlineDateStr}\" data-status=\"{$individualOrder->status}\" data-deadline=\"{$deadline}\">
                        <div class=\"orderID\" >order {$id}</div>";

                    $counter = 0;
                    foreach ($orderItemList as $orderItem) {
                        $arrangement = $orderItem->arrangement;
                        $counter += 1;
                        $order .= "  <div class=\"arrangement\" id=\"{$id}arrangement{$counter}\"  data-quantity=\"{$orderItem->quantity}\" data-name=\"{$arrangement->name}\" data-stalk=\"{$arrangement->stalks}\" data-flower=\"{$arrangement->flower->flowerName}\">{$arrangement->name} x {$orderItem->quantity}</div> 
                        <div class=\"flowers\">{$arrangement->stalks} stalks</div>
                        <div class=\"flowers\">{$arrangement->flower->flowerName}</div>";
                    }

                    $order .= "<div class=\"deadline\">$deadline</div></div>";
                }


//
//                    //Generate an order
//                    $id = "order2";
//                    $order1 = "<div class=\"item\" id=\"$id\" data-arrangementcount=\"4\">
//                        <div class=\"orderID\" >$id</div> 
//                        <div class=\"arrangement\" id=\"{$id}arrangement1\" data-quantity=\"3\" data-name=\"Extreme bouquet\" data-stalk=\"12\" data-flower=\"Rose\">Extreme bouquet x 3</div> 
//                        <div class=\"flowers\">12 stalks</div>
//                        <div class=\"flowers\">Rose</div>
//                        <div class=\"arrangement\" id=\"{$id}arrangement2\" data-quantity=\"2\" data-name=\"Supreme Flowers\" data-stalk=\"10\" data-flower=\"Lily\">Supreme Flowers x 2</div> 
//                        <div class=\"flowers\">10 stalks</div>
//                        <div class=\"flowers\">Lily</div>
//                        <div class=\"arrangement\" id=\"{$id}arrangement3\" data-quantity=\"3\" data-name=\"Extreme bouquet\" data-stalk=\"12\" data-flower=\"Rose\">Extreme bouquet x 3</div> 
//                        <div class=\"flowers\">12 stalks</div>
//                        <div class=\"flowers\">Rose</div>
//                        <div class=\"arrangement\" id=\"{$id}arrangement4\" data-quantity=\"2\" data-name=\"Supreme Flowers\" data-stalk=\"10\" data-flower=\"Lily\">Supreme Flowers x 2</div> 
//                        <div class=\"flowers\">10 stalks</div>
//                        <div class=\"flowers\">Lily</div>
//                        <div class=\"deadline\">3 hours left</div>
//                    </div>
//                </div>";

                echo $order;
                ?>

            </div>
        </div>
        <div class="overlay">
        </div>
        <div class="itemFocus">
            <div class="orderID" id="itemFocusOrderID"></div> 
            <div class="arrangementContainer">

            </div>

            <div class="bottomBar">
                <div class="targetDeadline" id="overlayTargetDeadline">12/12/2020</div>
                <div class="deadline" id="overlayDeadline">3 hours left</div>
                <div class="orderStatus">
                    <a href="" class="pending" id="pending"><div>Pending</div></a>
                    <a href="" class="doing" id="doing"><div>Doing</div></a>
                    <a href="" class="delivering" id="delivering"> <div>Delivering</div></a>
                    <a href="" class="done" id="done"> <div >Done</div></a>
                    <a href="" class="dropped" id="dropped"> <div >Dropped</div></a>

                </div>
            </div>
        </div>
    </body>
    <script>
        $(".item").click(function () {
            $(".itemFocus").addClass("itemFocusVisible");
            $(".overlay").addClass("overlayVisible");

            //get order ID
            var id = this.id;
            $("#itemFocusOrderID").html("order " + id);
            var arrangementCount = $("#" + id).data("arrangementcount");
            var status = $("#" + id).data("status");
            var deadline = $("#" + id).data("deadline");
            var targetDeadline = $("#" + id).data("targetdate");
            var arrangementContainer = "";

            $("#overlayDeadline").html(deadline);
            $("#overlayTargetDeadline").html(targetDeadline);

            for (var i = 0; i < arrangementCount; i++) {
                var quantity = $("#" + id + "arrangement" + (i + 1)).data("quantity");
                var name = $("#" + id + "arrangement" + (i + 1)).data("name");
                var flower = $("#" + id + "arrangement" + (i + 1)).data("flower");
                var stalk = $("#" + id + "arrangement" + (i + 1)).data("stalk");

                arrangementContainer += "<div class='arrangement'>" + name + "<div class='flowers'>" + stalk + " stalks</div> <div class='flowers'>" + flower + "</div><div class='arrangementQuantity'>x" + quantity + "</div></div>";
            }

            // Set values into itemFocus
            $(".itemFocus > .arrangementContainer").html(arrangementContainer);


            //Wrap the status buttons with the correct order ID
            $("#pending").attr("href", "../Controllers/Staff/updateOrder.php?id=" + id + "&" + "status=pending");
            $("#doing").attr("href", "../Controllers/Staff/updateOrder.php?id=" + id + "&" + "status=doing");
            $("#delivering").attr("href", "../Controllers/Staff/updateOrder.php?id=" + id + "&" + "status=delivering");
            $("#dropped").attr("href", "../Controllers/Staff/updateOrder.php?id=" + id + "&" + "status=dropped");
            $("#done").attr("href", "../Controllers/Staff/updateOrder.php?id=" + id + "&" + "status=done");

            //Highlight the current status
            switch (status) {
                case "doing":
                    $(".orderStatus a").removeClass("selected");
                    $("#doing").addClass("selected");
                    break;
                case "delivering":
                    $(".orderStatus a").removeClass("selected");
                    $("#delivering").addClass("selected");
                    break;
                case "dropped":
                    $(".orderStatus a").removeClass("selected");
                    $("#dropped").addClass("selected");
                    break;
                case "done":
                    $(".orderStatus a").removeClass("selected");
                    $("#done").addClass("selected");
                    break;
                default: //Default will be pending
                    $(".orderStatus a").removeClass("selected");
                    $("#pending").addClass("selected");
                    break;
            }

        });
        $(".overlay").click(function () {
            $(".itemFocus").removeClass("itemFocusVisible");
            $(".overlay").removeClass("overlayVisible");
        });
        $(".orderStatus a").click(function () {
            $(".orderStatus a").removeClass("selected");
            $(this).addClass("selected");
        });
        $(".orderStatus a").mouseover(function () {
            $(this).addClass("hover");
        });
        $(".orderStatus a").mouseleave(function () {
            $(this).removeClass("hover");
        });
        $(document).ready(function () {

        });
    </script>
    <script>
        // Code possible thanks to https://stackoverflow.com/questions/19491336/how-to-get-url-parameter-using-jquery-or-plain-javascript
        function getQueryString(query) {
            var pageURL = window.location.search.substring(1);
            var variables = pageURL.split('&');
            var key;

            for (var i = 0; i < variables.length; i++) {
                key = variables[i].split('=');

                if (key[0] === query) {
                    return key[1] === undefined ? true : decodeURIComponent(key[1]);
                }
            }
        }

        $(document).ready(function () {
            var returnCode = getQueryString("success");
            var id = getQueryString("id");
            var message = "";
            var color = "";

            switch (returnCode) {
                case "done":
                    message = "Order " + id + " is now marked as done!";
                    color = "lime";
                    break;
                case "doing":
                    message = "Order " + id + " is now marked as in progress!";
                    color = "cyan";
                    break;
                case "dropped":
                    message = "Order " + id + " has been dropped!";
                    color = "red";
                    break;
                case "pending":
                    message = "Order " + id + " is now pending!";
                    color = "orange";
                    break;
                case "delivering":
                    message = "Order " + id + " is now marked as being delivered!";
                    color = "lightpink";
                    break;
            }

            $(".message").html(message);
            $(".message").css("color", color);
        });

    </script>
</html>

