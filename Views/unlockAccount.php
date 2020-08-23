<?php
include('services.php');
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("guest");
/**
 * @author Yong Haw Quan
 */
?>
<html>
    <head>
        <title>Glory Florist : Account Recovery</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/logins.css">
    </head>
    <body>
        <div class="header">
            <h2>Account Recovery</h2>
        </div>

        <form method="post" action="unlockAccount.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Recovery Code</label>
                <input type="text" name="rCode">
            </div>
            <div class="input-group">
                <button type="submit" name="submitCode" class="btn">Submit</button>
            </div>
            <p>
                Back to login. <a href="login.php">Login</a>
            </p>
        </form>
    </body>


    <?php ?>
</html>