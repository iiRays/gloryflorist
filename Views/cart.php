<?php
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/Authorize.php");
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

        <form id='container' method='POST' action="save_cart.php"> <!-- <form id='container'> ??? -->

            <div id='hotbar'>
                <a href='home.php' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='cart.php' class='link' id='currentLink'>cart</a>
                <a href='Account.php' class='link'>account</a>
                <?php if (Session::isLoggedIn()) { ?>
                    <a href="logout.php" class='link'>logout</a>
                <?php } else { ?> <?php } ?>
                    
            </div>

            <div id='top'>
                <div id='text'>
                    <a href='home.php' id='back'>back to the&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shop</a>
                    <a id='title'>Your Cart</a>
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
                        $cart = Session::get("cart");
                        
                        foreach ($cart->items as $item) {
                            echo "<div class='item'>
                                    <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
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
                    <a href='confirmOrder.php' id='proceed_button'>PROCEED</a>
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

    <?php
    // upon saving
    if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
        // declare variables
        $quantities = explode(",", filter_input(INPUT_POST, "quantities"));
        
        //echo "<script type='text/javascript'>alert('$quantities[0]');</script>"; // debug
        
        // get cart from session
        $cart = Session::get("cart");

        // update cart
        for ($i = 0; $i < sizeof($cart->items); $i++) {
            $cart->items[$i]->quantity = $quantities[$i];
            //echo "<script>alert(".$cart->items[$i]->quantity.");</script>"; // debug
        }
        
        // save cart to session
        $_SESSION["cart"] = $cart;
    }
    ?>
</html>
