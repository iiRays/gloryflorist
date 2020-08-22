<!DOCTYPE html>
<?php
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");


$deliverytype = Quick::getPostData("deliveryType");
$date = Quick::getPostData("date");
$time = Quick::getPostData("time");
$cardmsg = Quick::getPostData("cardmsg");
$sender = Quick::getPostData("sender");


setcookie("deliverytype", $deliverytype, time() + (86400 * 30), "/", 0);
setcookie("date", $date, time() + (86400 * 30), "/", 0);
setcookie("time", $time, time() + (86400 * 30), "/", 0);
setcookie("cardmsg", $cardmsg, time() + (86400 * 30), "/", 0);
setcookie("sender", $sender, time() + (86400 * 30), "/", 0);
?>
<html>
    <head>
        <title>Glory Florist :</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link  rel="stylesheet" href="CSS/blabla.css">
    </head>
    <body>
        <!-- 
        This is to get the delivery address details
        -->
        <div class="center">
            <p><b>Note: </b>margin:auto will not work in IE8, unless a !DOCTYPE is declared.</p>
        </div>
        <form method="post" action="create_order.php">
            <div class="input"><h2>Delivery Address</h2></div>
            <div class="input">           
                <input type="text" name="recipientName" required="true" autocomplete="off"> 
                <label for="recipientName" class="label-name">
                    <span class="content-name">Recipient's Name</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="company" required="false" autocomplete="off"> 
                <label for="company" class="label-name">
                    <span class="content-name">Company(optional)</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="address" required="true" autocomplete="off"> 
                <label for="address" class="label-name">
                    <span class="content-name">Address</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="apartment-suite-unit-etc" required="off" autocomplete="false"> 
                <label for="apartment-suite-unit-etc" class="label-name">
                    <span class="content-name">Apartment, suite, unit etc. (optional)</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="city-town" required="true" autocomplete="off"> 
                <label for="city-town" class="label-name">
                    <span class="content-name">City/Town</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="postcode" required="true" autocomplete="off"> 
                <label for="postcode" class="label-name">
                    <span class="content-name">Postcode</span>
                </label>
            </div>
            <div class="input">           
                <input type="text" name="contact" required="true" autocomplete="off"> 
                <label for="contact" class="label-name">
                    <span class="content-name">Please provide phone number of receiver or sender</span>
                </label>
            </div>
            <div class="input">
                <button >CONTINUE</button>

            </div>
            <div class="input">
                <a href="cart.php" >Return to cart</a>
            </div>
        </form>
    </body>
</html>

<?php
$recipient = Quick::getPostData("recipientName");
$company = Quick::getPostData("company");
$address = Quick::getPostData("address");
$asset_type = Quick::getPostData("apartment-suite-unit-etc");
$city_town = Quick::getPostData("city-town");
$postcode = Quick::getPostData("postcode");
$contact = Quick::getPostData("contact");


//store in database
DB::connect();
if (isset($contact)) {
    $delivery = R::dispense('delivery');
    $delivery->cardmessage = $_COOKIE["cardmsg"];
    $delivery->sender = $_COOKIE["sender"];
    $delivery->contact = $contact;
    $delivery->date = $_COOKIE["date"];
    $delivery->timeslot = $_COOKIE["time"];
    $delivery->method = $_COOKIE["deliverytype"];
    $delivery->address = $address;
    $delivery->deliveryfee = 5.9;
    $delivery->company = $company;
    $delivery->asset_type = $asset_type;
    $delivery->city_town = $city_town;
    $delivery->postcode = $postcode;
    $delivery->recipient = $recipient;
    $id = R::store($delivery);
}

//clear the cookies
$_COOKIE["deliverytype"] = null;
$_COOKIE["date"] = null;
$_COOKIE["time"] = null;
$_COOKIE["cardmsg"] = null;
$_COOKIE["sender"] = null;
?>
