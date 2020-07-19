<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist :: Order</title>
        <link rel="stylesheet" href="confirmOrder.css">
    </head>
    <body>

    <form id='container'>

      <div id='hotbar'>
        <a href='home.php' id='glory'>glory florist</a>
        <a href='#' class='link'>shop</a>
        <a href='cart.php' class='link' id='currentLink'>cart</a>
        <a href='#' class='link'>account</a>
      </div>

      <div id='top'>
        <div id='text'>
          <a href='cart.php' id='back'>back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to your&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cart</a>
          <a id='title'>Confirm Order</a>
        </div>
      </div>

      <div id='content'>

        <div id='left'>

          <a class='heading'>Receipt</a>
         
          <?php
          
            $quantities = explode(",", filter_input(INPUT_POST, "quantities"));
            
            // change to get from db
          
          ?>

          <div id='receipt'>
            <div class='item'>
              <!--<a class='amount'><?php echo $quantities[0];?></a> -->
              <a class='amount'>1</a>
              <a class='name' href='#'>White rose</a>
              <a class='price'>$10.00</a>
            </div>

            <div class='item'>
              <a class='amount'>3</a>
              <a class='name' href='#'>White flower</a>
              <a class='price'>$30.00</a>
            </div>

            <div class='item'>
              <a class='amount'>2</a>
              <a class='name' href='#'>White thing</a>
              <a class='price'>$20.00</a>
            </div>
          </div>

          <a id='total'>Total: <span>$150.00</span></a>

        </div>

        <div id='right'>

          <a class='heading'>Payment details</a>

        </div>

      </div>

    </form>

    </body>
</html>
