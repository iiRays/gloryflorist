<?php 
include('AccountDetails.php'); 
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("customer");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Glory Florist : Account</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/account.css">
    </head>
    <body>
        <form id='container' method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> <!-- <form id='container'> ??? -->
            <center> 
                <div id='hotbar'>
                    <a href='home.php' id='glory'>glory florist</a>
                    <a href='#' class='link'>shop</a>
                    <a href='cart.php' class='link'>cart</a>
                    <a href='#' class='link' id='currentLink'>account</a>
                    <?php if (Session::isLoggedIn()) { ?>
                        <a href="logout.php" class='link'>logout</a>
                    <?php } else { ?> <?php } ?>

                </div>

                <div class="box">
                    <img src="../profile.png" alt=""/>
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="Phone No.">
                    <input type="text" name="address" placeholder="Address">
                    <button name="btnCancel" style="float: left;margin:10px 0 0 18.2%;">CANCEL</button>
                    <button name="btnDone" style="float: right;margin:10px 18.2% 0 0;">DONE</button>
                </div>
            </center>

        </form>

    </body>
</html>