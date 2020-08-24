<?php
 require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Security/Authorize.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist</title>
        <link rel="stylesheet" href="CSS/home.css">
    </head>
    <body>

        <div id='container'>
            <a href="home.php"><img id='feature' src='https://i.postimg.cc/d1fJr9k2/sakura.png'></a>
            <div id='links'>
                <a class='link' href='viewFloral(Cust).php'>shop</a>
                <a class='link' href='cart.php'>cart</a>
                <a class='link' href='Account.php'>account</a>
                <?php echo Authorize::isUserA("staff") ? "<a class='link' href='staffDashboard.php'>dashboard</a>" : ""; ?>
                <?php echo Authorize::isUserA("customer") ? "<a class='link' href='logout.php'>logout</a>" : ""; ?>
            </div>
        </div>

    </body>
</html>
