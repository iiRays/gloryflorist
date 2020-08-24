<!DOCTYPE html>
<?php
/*
  Author: kelvin tham yit hang
 */

//authorization check
require_once __DIR__ . '\..\Controllers\Security\Authorize.php';
Authorize::onlyAllow("customer"); //temperory disable for better coding envir
?>
<html>
    <head>
        <title>Glory Florist :Delivery Address Details</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link  rel="stylesheet" href="CSS/deliveryAddress.css"> 
        <link rel="stylesheet" type="text/css" href="CSS/common.css">
    </head>
    <body>         
        <div id="container" style="overflow-y: scroll">
            <?php Quick::printHeader("shop") ?>
            <div id='top'>
                <div id='text'>
                    <a id='title'>Delivery Address Details</a>
                </div>
            </div>

            <div id="content">
                <form method="post" action="deliveryAddress.php">
                    <div style="background: white; padding-top: 15px;">                  
                        <?php
                        require_once __DIR__ . '\..\Views\deliveryAddressHandler.php';
                        ?>

                        <div class="input"><h2>Delivery Address</h2></div>
                        <div class="input">           
                            <input type="text" name="recipientname" required autocomplete="off" value="<?php echo isset($_POST['recipientname']) ? htmlspecialchars($_POST['recipientname'], ENT_QUOTES) : ''; ?>"> 
                            <label for="recipientname" class="label-name">
                                <span class="content-name">Recipient's Name</span>
                            </label>
                        </div>
                        <div class="input">           
                            <input type="text" name="company" required autocomplete="off" value="<?php echo isset($_POST['company']) ? htmlspecialchars($_POST['company'], ENT_QUOTES) : ''; ?>"> 
                            <label for="company" class="label-name">
                                <span class="content-name">Company</span>
                            </label>
                        </div>
                        <div class="input">           
                            <input type="text" name="address" required autocomplete="off" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : ''; ?>"> 
                            <label for="address" class="label-name">
                                <span class="content-name">Address</span>
                            </label>
                        </div>
                        <div class="input">           
                            <input type="text" name="apartment-suite-unit-etc" required autocomplete="off" value="<?php echo isset($_POST['apartment-suite-unit-etc']) ? htmlspecialchars($_POST['apartment-suite-unit-etc'], ENT_QUOTES) : ''; ?>"> 
                            <label for="apartment-suite-unit-etc" class="label-name">
                                <span class="content-name">Apartment, suite, unit etc.</span>
                            </label>
                        </div>
                        <div class="input">           
                            <input type="text" name="city-town" required autocomplete="off" value="<?php echo isset($_POST['city-town']) ? htmlspecialchars($_POST['city-town'], ENT_QUOTES) : ''; ?>"> 
                            <label for="city-town" class="label-name">
                                <span class="content-name">City/Town</span>
                            </label>
                        </div>
                        <div class="input">           
                            <input type="text" name="postcode" required autocomplete="off" value="<?php echo isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode'], ENT_QUOTES) : ''; ?>"> 
                            <label for="postcode" class="label-name">
                                <span class="content-name">Postcode</span>
                            </label>
                        </div>
                        <div class="input">           
                            <input type="text" name="recipientcontact" required="true" autocomplete="off" value="<?php echo isset($_POST['recipientcontact']) ? htmlspecialchars($_POST['recipientcontact'], ENT_QUOTES) : ''; ?>"> 
                            <label for="recipientcontact" class="label-name">
                                <span class="content-name">Please provide phone number of receiver</span>
                            </label>
                        </div>
                        <div class="input">
                            <br/>
                            <input type="submit" name="submit"/>
                        </div>
                        <div class="input">
                        </div>
                        <div class="input">
                            <a href="cart.php" >Return to cart</a>
                        </div>
                    </div>
                </form>
            </div>

        </form>

</body>
</html>

