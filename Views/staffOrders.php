<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : View Orders</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="common.css">
        <link rel="stylesheet" href="staffOrders.css">
    </head>
    <body>
        <div id='container'> <!-- <form id='container'> ??? -->

            <div id='hotbar'>
                <a href='#' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='#' class='link'>cart</a>
                <a href='#' class='link' >account</a>
                <a href='#' class='link' id='currentLink'>dashboard</a>
            </div>

            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>View Orders</a>
                </div>
            </div>
            <div id="content">

                <div class="masonryContainer">
                    <?php
                    include "../Controllers/Util/rb.php";

                    R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB
                    $orderList = R::findAll("orders");
                    $order = "";

                    foreach ($orderList as $individualOrder) {
                        
                        $id = $individualOrder->id;
                       
                        //Get order item
                        $orderItemList = R::find("orderitem", "order_id = ?", [$id]);
                         $count = count($orderItemList);
                        $order .= "<div class=\"item\" id=\"{$id}\" data-arrangementcount=\"{$count}\">
                        <div class=\"orderID\" >order {$id}</div>";

                        $counter = 0;
                        foreach ($orderItemList as $orderItem) {
                            $arrangement = $orderItem->arrangement;
                            $counter += 1;
                            $order .= "  <div class=\"arrangement\" id=\"{$id}arrangement{$counter}\" data-quantity=\"{$orderItem->quantity}\" data-name=\"{$arrangement->name}\" data-stalk=\"{$arrangement->stalks}\" data-flower=\"{$arrangement->flower->flowerName}\">{$arrangement->name} x {$orderItem->quantity}</div> 
                        <div class=\"flowers\">{$arrangement->stalks} stalks</div>
                        <div class=\"flowers\">{$arrangement->flower->flowerName}</div>";
                        }
                        
                        $order .= "<div class=\"deadline\">3 hours left</div></div></div>";
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
                    <div class="deadline">3 hours left</div>
                    <div class="orderStatus">
                        <div class="pending selected">Pending</div>
                        <div class="doing">Doing</div>
                        <div class="delivering">Delivering</div>
                        <div class="dropped">Dropped</div>
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
            var arrangementContainer = "";

            for (var i = 0; i < arrangementCount; i++) {
                var quantity = $("#" + id + "arrangement" + (i + 1)).data("quantity");
                var name = $("#" + id + "arrangement" + (i + 1)).data("name");
                var flower = $("#" + id + "arrangement" + (i + 1)).data("flower");
                var stalk = $("#" + id + "arrangement" + (i + 1)).data("stalk");

                arrangementContainer += "<div class='arrangement'>" + name + "<div class='flowers'>" + stalk + " stalks</div> <div class='flowers'>" + flower + "</div><div class='arrangementQuantity'>x" + quantity + "</div></div>";
            }

            // Set values into itemFocus
            $(".itemFocus > .arrangementContainer").html(arrangementContainer);
        });
        $(".overlay").click(function () {
            $(".itemFocus").removeClass("itemFocusVisible");
            $(".overlay").removeClass("overlayVisible");
        });
        $(".orderStatus div").click(function () {
            $(".orderStatus div").removeClass("selected");
            $(this).addClass("selected");
        });
        $(".orderStatus div").mouseover(function () {
            $(this).addClass("hover");
        });
        $(".orderStatus div").mouseleave(function () {
            $(this).removeClass("hover");
        });
        $(document).ready(function () {

        });
    </script>
</html>

