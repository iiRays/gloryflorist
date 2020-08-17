<!DOCTYPE html>
<?php include('services.php'); ?>
<html>
    <head>
        <title>Glory Florist :</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/delivery.css">
       
    </head>
    <body>
        <div class="row">
            <!-- 
            This column will show the order details of customer
            get order details from previous page
            -->
            <div class="column"> 
                <title>Your Order</title>

            </div>

            <!-- 
            This column will show the form for customer to fill in the delivery/pickup details 
            -->
            <div class="column">
                <form method="post" action=".php">
                    <?php include('errors.php'); ?>
                    <div class="input-group">
                        <label>PLEASE SELECT A DELIVERY TYPE</label>
                        <select name="deliveryType">
                            <option value="delivery">Delivery</option>
                            <option value="pickup">Delivery</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>PLEASE SELECT A DELIVERY DATE/TIME:</label>
                        <input type="date" name="date" value="">
                        <input type="time" name="time" value="">
                    </div>
                    <div class="input-group">
                        <label>CHOOSE YOUR PERSONAL CARD MESSAGE:</label>
                        <textarea rows='5' cols='60' name=''>Type your free card message in the box or select one below.The card will put together with your flower at no additional cost.
                        </textarea>

                        <!-- consideration, text option suggested -->
                        <button value="">Happy Birthday</button>
                        <button value="">Get well soon</button>
                        <button value="">Congratulation</button>
                        <button value="">Happy Anniversary</button>
                    </div>
                    <div class="input-group">
                        <label>TYPE SENDER'S NAME</label>
                        <input type="text" name="">
                    </div>
                    <div class="input-group">
                        <button type="submit" name="" class="btn">PROCEED TO DELIVERY ADDRESS</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
