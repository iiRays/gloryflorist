<!DOCTYPE html>
<?php
/*
  Author: kelvin tham yit hang
 */
?>
<html>
    <head>
        <title>Glory Florist :</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS/blablabla.css">
    </head>
    <body>

        <div class="column">
            <form method="post" action="" onsubmit="return check()" id='frm'>
                <div class="input">
                    <label for="deliveryType">PLEASE SELECT A DELIVERY TYPE</label>
                    <select name="deliveryType" id='deliveryType' onchange='valueChanged()'>
                        <option value="delivery">Delivery</option>
                        <option value="pickup">Self Pickup</option>
                    </select>
                </div>
                <div class="input" id='deliveryinfo'>
                    <label for="date">PLEASE SELECT A DELIVERY DATE/TIME:</label>
                    <input type="date" name="date" value="">
                    <div class="btn-group"> 
                        <button type="button" onclick='document.getElementById("time").value = "9AM - 1PM";'>9AM - 1PM</button>
                        <button type="button" onclick='document.getElementById("time").value = "1PM - 6PM";'>1PM - 6PM</button>
                        <input type="hidden" name="time" id= 'time' value="time here">
                    </div>
                </div>
                <div class="input">
                    <label for="cardmsg">CHOOSE YOUR PERSONAL CARD MESSAGE:</label>
                    <textarea onfocus="clearDefaultMsg()" rows='5' cols='60' name='cardmsg' id='cardmsg'>Type your free card message in the box or select one below.The card will put together with your flower at no additional cost.</textarea>
                    <!-- consideration, text option suggested -->
                    <div class="btn-group-msg">
                        <button value="">Happy Birthday</button>
                        <button value="">Get well soon</button>
                        <button value="">Congratulation</button>
                        <button value="">Happy Anniversary</button>
                    </div>
                </div>

                <div class="input">
                    <label for='sender'>TYPE SENDER'S NAME</label>
                    <input type="text" name="sender">
                </div>
                <div class="input">
                    <button type="submit" name="" class="btn">PROCEED TO DELIVERY ADDRESS</button>
                </div>
                <script type="text/javascript">
                    function  valueChanged() {
                        var value = document.getElementById('deliveryType').options[document.getElementById("deliveryType").selectedIndex].value;
                        if (value.localeCompare("delivery") === 0) {

                            document.getElementById("deliveryinfo").style.display = 'block';
                        } else {
                            document.getElementById("deliveryinfo").style.display = 'none';
                        }
                    }

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
                            //url = 'add_sal_success_wo.php';
                            //document.addsalsuccess.action = url;
                            window.alert("redirect to ...")
                        }
                        return true;
                    }

                </script>
            </form>
        </div>
    </body>
</html>


