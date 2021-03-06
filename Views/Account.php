<?php
require_once('../Controllers/Util/AccountDetails.php');
require_once("../Controllers/Security/Authorize.php");
require_once("../Controllers/Util/RoleStrategy/RoleStrategy.php");
require_once("../Controllers/Util/Quick.php");
Authorize::onlyAllow("customer");
/**
 * @author Yong Haw Quan
 */
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
               <?php Quick::printHeader("account")?>;

                <div class="box">
                    <?php include('errors.php'); ?>
                    <img src="../profile.png" alt=""/>
                    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name">
                    <input type="text" name="email" value="<?php echo $email; ?>" readonly>
                    <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone No.">
                    <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Address">
                    <input type="text" name="password_1"  placeholder="Password (Optional)">
                    <input type="text" name="password_2"  placeholder="Re-enter Password (Optional)">
                    <button type="submit" name="btnCancel" style="float: left;margin:10px 0 0 18.2%;">CANCEL</button>
                    <button type="submit" name="btnDone" style="float: right;margin:10px 18.2% 0 0;">DONE</button>
                </div>
                
                <a href='customerOrders.php' id='viewOrders_button'>VIEW ORDERS</a>
            </center>

        </form>

    </body>
</html>