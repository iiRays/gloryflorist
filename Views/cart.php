<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Cart</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="cart.css">
    </head>
    <body>
        
        <form id='container' method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- <form id='container'> ??? -->

          <div id='hotbar'>
            <a href='home.php' id='glory'>glory florist</a>
            <a href='#' class='link'>shop</a>
            <a href='cart.php' class='link' id='currentLink'>cart</a>
            <a href='#' class='link'>account</a>
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
                
                <input type='hidden' name='quantities' id='quantities' value=''>
                
                <?php
                // TODO: add 'order' and 'orderitem' classes, and use them to store dummy data for this shit
                
                $noOfItems = 3; // all this stuff should gotten from db, in reality
                
                echo "<div class='item'>
                  <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
                  <input type='textbox' name='quantity' class='quantity' value='1'>
                  <a href='#' class='name'>White rose</a>
                </div>

                <div class='item'>
                  <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
                  <input type='textbox' name='quantity' class='quantity' value='3'>
                  <a href='#' class='name'>White flower</a>
                </div>

                <div class='item'>
                  <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
                  <input type='textbox' name='quantity' class='quantity' value='2'>
                  <a href='#' class='name'>White thing</a>
                </div>";
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
            $('#save_button').click(function(){
                var quantities = $('input[class="quantity"]').map(function(){
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
                
                // TODO: when saving, actually update records in db
            }
        
        ?>
</html>
