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
        <title>Glory Florist : Cart</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/cart.css">
    </head>
    <body>

        <form id='container' method='POST' action="../Controllers/Ordering/save_cart.php"> <!-- <form id='container'> ??? -->

            <?php Quick::printHeader("cart")?>;

            <div id='top'>
                <div id='text'>
                    <a href='viewFloral%28Cust%29.php' id='back'>back to the&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shop</a>
                    <a id='title'>Your Cart</a>
                    <a id='error'><?php ErrorHandler::displayErrors(); ?></a>
                </div>
            </div>

            <div id='content'>

                <div id='left'>
                    <div id='list'>

                        <a class='heading'>Items in your cart</a>

                        <input type='hidden' name='quantities' id='quantities' value=''> <!-- STORES ALL QUANTITIES -->

                        <?php
                        
                        R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');
                        
                        // get cart from session
                        $cartAdapter = Session::get("cartAdapter");
                        
                        foreach ($cartAdapter->getItems() as $item) {
                            echo "<div class='item'>
                                    <img src='".$item->arrangement->image_url."'>
                                    <input type='textbox' name='quantity' class='quantity' value='".$item->quantity."'>
                                    <a href='#' class='name'>".$item->arrangement->name."</a>
                                  </div>";
                        }
                        ?>

                    </div>
                </div>

                <div id='right'>
                    <a class='heading'>Save changes to your cart</a>
                    <input type='submit' id='save_button' name='save' value='SAVE'>
                    <a class='heading'>Ready to make your order?</a>
                    <a href='../Controllers/Ordering/confirm_cart.php' id='proceed_button'>PROCEED</a>
                    <a class='heading' style='margin-top: 25px;'>Revert latest changes to your cart?</a>
                    <a href='../Controllers/Ordering/restore_cart.php' id='proceed_button'>RESTORE</a>
                </div>

            </div>

        </form>

    </body>

    <script>
        // upon saving, get all the quantities (from textboxes) and set their array as value of hidden field
        $('#save_button').click(function () {
            var quantities = $('input[class="quantity"]').map(function () {
                return this.value;
            }).get();
            $('#quantities').val(quantities);
        });
    </script>
</html>
