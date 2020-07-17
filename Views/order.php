<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist :: Order</title>
        <link rel="stylesheet" href="order.css">
    </head>
    <body>

    <form id='container'>

      <div id='hotbar'>
        <a href='#' id='glory'>glory florist</a>
        <a href='#' class='link'>shop</a>
        <a href='#' class='link' id='currentLink'>cart</a>
        <a href='#' class='link'>account</a>
      </div>

      <div id='top'>
        <div id='text'>
          <a href='#' id='back'>back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to your&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cart</a>
          <a id='title'>Confirm Order</a>
        </div>
      </div>

      <div id='content'>

        <div id='left'>

          <a class='heading'>Receipt</a>
         
          <?php
          
            $quantities = explode(",", filter_input(INPUT_POST, "quantities"));
          
          ?>

          <div id='receipt'>
            <div class='item'>
              <a class='amount'><?php echo $quantities[0];?></a>
              <a class='name' href='#'>White rose</a>
              <a class='price'>$10.00</a>
            </div>

            <div class='item'>
              <a class='amount'><?php echo $quantities[1];?></a>
              <a class='name' href='#'>White flower</a>
              <a class='price'>$30.00</a>
            </div>

            <div class='item'>
              <a class='amount'><?php echo $quantities[2];?></a>
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
