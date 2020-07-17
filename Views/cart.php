<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Cart</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="cart.css">
    </head>
    <body>
        
        <?php
            /*if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") { 
               echo "<script type='text/javascript'>alert('sup');</script>";
            }*/
        ?>
        
        <form id='container' method='POST' action='order.php'> <!-- <form id='container'> ??? -->

          <div id='hotbar'>
            <a href='#' id='glory'>glory florist</a>
            <a href='#' class='link'>shop</a>
            <a href='#' class='link' id='currentLink'>cart</a>
            <a href='#' class='link'>account</a>
          </div>

          <div id='top'>
            <div id='text'>
              <a href='#' id='back'>back to the&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shop</a>
              <a id='title'>Your Cart</a>
            </div>
          </div>

          <div id='content'>

            <div id='left'>
              <div id='list'>

                <a class='heading'>Items in your cart</a>
                
                <input type='hidden' name='quantities' id='quantities' value=''>
                
                <?php
                $noOfItems = 3;
                
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
              <a href='#' id='proceed_button'>PROCEED</a>
            </div>

          </div>

        </form>

        </body>
        
        <script>
            $('#save_button').click(function(){
                var quantities = $('input[class="quantity"]').map(function(){
                    return this.value;
                }).get();
                $('#quantities').val(quantities);
            });
        </script>
</html>
