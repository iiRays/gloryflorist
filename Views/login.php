<?php include('services.php'); ?>
<html>
    <head>
        <title>Glory Florist : Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="CSS/logins.css">
    </head>
    <body>
        <div class="header">
            <h2>Login</h2>
        </div>

        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>User ID</label>
                <input type="text" name="userID" value="<?php echo $userID; ?>">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="text" name="password_1">
            </div>
            <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
            </div>
            <p>
                Not a member yet? <a href="registerCustomer.php">Sign Up</a>
            </p>
        </form>
    </body>


    <?php
    ?>
</html>