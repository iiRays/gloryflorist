<?php
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/Authorize.php");
require_once("../Controllers/Security/ErrorHandler.php");
require_once("../Controllers/Util/Quick.php");
Authorize::onlyAllow("customer");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Order Details</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/customerOrder.css">
    </head>
    <body>

    <div id='container'>

      <?php Quick::printHeader("account")?>;

      <div id='top'>
        <div id='content'>
          <a href='customerOrders.php' id='back'>back&nbsp;&nbsp;&nbsp;&nbsp;to orders</a>
          <a id='title'>Order Details</a>
        </div>
      </div>

      <div id='bottom'>
        <div id='content'>

          <div id='list'>

            <a class='title'>Order Information</a>
            
            <div id='details_heading'>
              <a id='label'>LABEL</a>
              <a id='value'>VALUE</a>
            </div>
            
            <?php
            
            $orderId = $_GET['orderId'];
            
            if ($orderId == null) {
                Quick::redirect("Views/customerOrders.php");
            }
            
            R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');
            
            $order = R::findOne('orders', 'id = ?', [$orderId]);
            
            if ($order == null) {
                Quick::redirect("Views/customerOrders.php");
            }
            
            echo "<div class='detail'>
                    <a class='label'>ID</a>
                    <a class='value'>".$order->id."</a>
                  </div>

                  <div class='detail'>
                    <a class='label'>CUSTOMER ID</a>
                    <a class='value'>".$order->customer_id."</a>
                  </div>

                  <div class='detail'>
                    <a class='label'>GRAND TOTAL</a>
                    <a class='value'>RM ".$order->grand_total."</a>
                  </div>

                  <div class='detail'>
                    <a class='label'>ADDRESS</a>
                    <a class='value'>".$order->delivery_address."</a>
                  </div>

                  <div class='detail'>
                    <a class='label'>STATUS</a>
                    <a class='value'>".$order->status."</a>
                  </div>

                  <div class='detail'>
                    <a class='label'>DELIVERY DATE</a>
                    <a class='value'>".$order->target_date."</a>
                  </div>";
            
            ?>

            <a class='title' style='margin-top: 30px;'>Order Items</a>

            <div id='items_heading'>
              <a id='id'>ID</a>
              <a id='name'>NAME</a>
              <a id='quantity'>QUANTITY</a>
            </div>
            
            <?php
            $orderItems = R::findAll('orderitem', 'order_id = ?', [$orderId]);
            
            echo count($orderItems);
            
            foreach ($orderItems as $item) {
                $arrangement = R::load('arrangement', $item->arrangement_id);
                
                echo "<div class='item'>
                        <a class='id'>".$arrangement->id."</a>
                        <a class='name'>".$arrangement->name."</a>
                        <a class='quantity'>".$item->quantity."</a>
                      </div>";
            }
            ?>

          </div>

        </div>
      </div>

    </div>

    </body>
</html>
