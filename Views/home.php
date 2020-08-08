<?php
include('services.php');

//If user not logged in, cannot access home page
//    if(empty($_SESSION['userID'])){
//        header('location: login.php');
//    }
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
                <a class='link' href='#'>shop</a>
                <a class='link' href='cart.php'>cart</a>
                <a class='link' href='#'>account</a>
            </div>
        </div>

        <div class="content">
            <?php if (isset($_SESSION["userID"])): ?>
                <p>Welcome <strong><?php echo $_SESSION['userID']; ?></strong></p>
                <p><a href="home.php?logout='1'" style="color: red">Logout</a></p>
            <?php endif ?>
        </div>
    </body>
</html>
