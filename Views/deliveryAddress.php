<!DOCTYPE html>
<?php include('services.php'); ?>
<html>
    <head>
        <title>Glory Florist :</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/deliveryAddress.css">
    </head>
    <body>
        <!-- 
        This is to get the delivery address details
        -->
        <form method="post" action=".php">
            <?php include('errors.php'); ?>
            <h2>Contact Information</h2>
            <div class="input">           
                <input type="text" name="email" required="true" autocomplete="false"> 
                <label for="email" class="label-name">
                    <span class="content-name">Your Email(For Order Confirmation)</span>
                </label>
            </div>

            <h2>Delivery Address</h2>
            <div class="input">           
                <input type="text" name="recipientName" required="true" autocomplete="false"> 
                <label for="recipientName" class="label-name">
                    <span class="content-name">Recipient's Name</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="company" required="false" autocomplete="false"> 
                <label for="company" class="label-name">
                    <span class="content-name">Company(optional)</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="address" required="true" autocomplete="false"> 
                <label for="address" class="label-name">
                    <span class="content-name">Address</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="Apartment-suite-unit-etc" required="false" autocomplete="false"> 
                <label for="Apartment-suite-unit-etc" class="label-name">
                    <span class="content-name">Apartment, suite, unit etc. (optional)</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="City-Town" required="true" autocomplete="false"> 
                <label for="City-Town" class="label-name">
                    <span class="content-name">City/Town</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="postcode" required="true" autocomplete="false"> 
                <label for="postcode" class="label-name">
                    <span class="content-name">Postcode</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="phone" required="true" autocomplete="false"> 
                <label for="phone" class="label-name">
                    <span class="content-name">Please provide phone number of receiver or sender</span>
                </label>
            </div>
            <div>
                <button>CONTINUE</button>
                
            </div>
            <div>
                <a href="">Return to cart</a>
            </div>
        </form>
    </body>
</html>
