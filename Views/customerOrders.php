<?php
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/Authorize.php");
require_once("../Controllers/Security/ErrorHandler.php");
Authorize::onlyAllow("customer");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Your Orders</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/customerOrders.css">
    </head>
    <body>

    <div id='container'>

      <?php Quick::printHeader("account")?>;

      <div id='top'>
        <div id='content'>
          <a href='Account.php' id='back'>back to&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;account</a>
          <a id='title'>Your Orders</a>
        </div>
      </div>

      <div id='bottom'>
        <div id='content'>

          <div id='list'>

            <div id='heading'>
              <a id='id'>ID</a>
              <a id='price'>PRICE</a>
            </div>
              
            <?php
            
            R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');
            $user = Session::get("user");
            
            $orders = R::findAll('orders', 'customer_id = ?', [$user->id]);
            
            foreach ($orders as $order) {
                echo "<div class='item'>
                    <a class='id' href='customerOrder.php?orderId=".$order->id."'>#".$order->id."</a>
                    <a class='price' href='customerOrder.php?orderId=".$order->id."'>RM".$order->grand_total."</a>
                  </div>";
            }
            
            ?>

          </div>

        </div>
      </div>

    </div>

    </body>
</html>
