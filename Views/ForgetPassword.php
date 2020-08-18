<?php include('services.php'); 
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("guest");
?>
<html>
    <head>
        <title>Glory Florist : Forget Password</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/logins.css">
    </head>
    <body>
        <div class="header">
            <h2>Forget Password</h2>
        </div>

        <form method="post" action="ForgetPassword.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="input-group">
                <button type="submit" name="submitPassword" class="btn">Submit</button>
            </div>
            <p>
                Back to login. <a href="login.php">Login</a>
            </p>
        </form>
    </body>


    <?php
    ?>
</html>