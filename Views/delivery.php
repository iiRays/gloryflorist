<!DOCTYPE html>
<?php
/*
  Author: kelvin tham yit hang
 */

//authorization check
require_once __DIR__ . '\..\Controllers\Security\Authorize.php';
Authorize::onlyAllow("customer"); //temperory disable for better coding envir

$default_text = 'Type your free card message in the box or select one below.The card will put together with your flower at no additional cost.';
?>
<html>
    <head>
        <title>Glory Florist :Delivery Details</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/common.css">
        <link rel="stylesheet" type="text/css" href="CSS/delivery.css">
    </head>
    <body>
        <div id='container'> <!-- <form id='container'> ??? -->
            <?php Quick::printHeader("shop") ?>
            <div id='top'>
                <div id='text'>
                    <a id='title'>Delivery Details</a>
                </div>
            </div>
            <div id="content">

                <div class="column">
                    <form method="post" action="delivery.php" id='frm'>
                        <?php require_once __DIR__ . '\..\Views\deliveryHandler.php'; ?>
                        <div class="input">
                            <label for="deliveryType">PLEASE SELECT A DELIVERY TYPE</label>
                            <select name="deliveryType">
                                <option <?php if (isset($_POST['deliveryType']) && $_POST['deliveryType'] == "delivery") echo "selected"; ?> value="delivery">Delivery</option>
                                <option <?php if (isset($_POST['deliveryType']) && $_POST['deliveryType'] == "pickup") echo "selected"; ?> value="pickup">Self Pickup</option>
                            </select>
                        </div>
                        <div class="input">
                            <label for="date">PLEASE SELECT A DELIVERY/PICKUP DATE:</label>
                            <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date'], ENT_QUOTES) : ''; ?>" required="true">
                        </div>
                        <div>
                            <label for="time" >PLEASE SELECT A DELIVERY/PICKUP TIME:</label>
                            <input type="time" name="time" min="09:00" max="18:59" value="<?php echo isset($_POST['time']) ? htmlspecialchars($_POST['time'], ENT_QUOTES) : ''; ?>"/>
                        </div>
                        <div class="input">
                            <label for="cardmsg">CHOOSE YOUR PERSONAL CARD MESSAGE:</label>
                            <textarea onfocus="clearDefaultMsg()" rows='5' cols='60' name='cardmsg'><?php echo $cardmsg = isset($_POST['cardmsg']) ? htmlspecialchars($_POST['cardmsg'], ENT_QUOTES) : $default_text; ?></textarea>
                        </div>

                        <div class="input">
                            <label for='sender'>TYPE SENDER'S NAME: </label>
                            <input type="text" name="sender" required="true" autocomplete="off" value="<?php echo isset($_POST['sender']) ? htmlspecialchars($_POST['sender'], ENT_QUOTES) : ''; ?>">
                        </div>
                        <div class="input">                                      
                            <label for="sendercontact" class="label-name">PLEASE PROVIDE YOUR PHONE NUMBER: </label>
                            <input type="text" name="sendercontact" required="true" autocomplete="off" value="<?php echo isset($_POST['sendercontact']) ? htmlspecialchars($_POST['sendercontact'], ENT_QUOTES) : ''; ?>"> 
                        </div>
                        <div class="input">
                            <button type="submit" name="" class="btn">PROCEED</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">

        function clearDefaultMsg() {

            var defaultMsg = "Type your free card message in the box or select one below.The card will put together with your flower at no additional cost.";
            var msg = document.getElementById("cardmsg").value;
            if (msg.localeCompare(defaultMsg) === 0) {
                document.getElementById("cardmsg").value = '';
            }
        }

        function check() {
            var f = document.getElementById("frm");
            f.setAttribute('method', "post");
            var value = document.getElementById('deliveryType').options[document.getElementById("deliveryType").selectedIndex].value;
            if (value.localeCompare("delivery") === 0)
            {
                f.setAttribute('action', "deliveryAddress.php");
            } else
            {
                f.setAttribute('action', "delivery.php");
            }
            return true;
        }


    </script>
</html>



