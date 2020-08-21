<?php 
require_once('services.php'); 
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("guest");

?>

<html>
    <head>
        <title>Glory Florist : Register</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/registerCustomer.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>

        <form method="post" action="registerCustomer.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" >
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" > 
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1" value="<?php echo isset($_POST['password_1']) ? $_POST['password_1'] : '' ?>">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2" value="<?php echo isset($_POST['password_2']) ? $_POST['password_2'] : '' ?>">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">Login</a>
            </p>
        </form>
    </body>


    <?php
    ?>
</html>