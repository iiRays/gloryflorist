<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("staff");
?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewFlower(Staff).css">
        <title>Glory Florist : Flower Available</title>
    </head>
    <body>
        <div id='container'> 

            <div id='hotbar'>
                <a href='#' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='#' class='link'>cart</a>
                <a href='#' class='link' >account</a>
                <a href='#' class='link' id='currentLink'>dashboard</a>
            </div>

            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>Flower Available</a>
                </div>
            </div>

            <div id='content'>
                <div id='list'>
                    <div class='item'>
                        <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
                        <a href='#' class='name'>White rose</a>
                        <a href='#' id='edit_button'>Edit</a>
                    </div>

                    <div class='item'>
                        <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
                        <a href='#' class='name'>White rose</a>
                        <a href='#' id='edit_button'>Edit</a>
                    </div>

                    <div class='item'>
                        <img src='https://i.dlpng.com/static/png/6858266_preview.png'>
                        <a href='#' class='name'>White rose</a>
                        <a href='#' id='edit_button'>Edit</a>
                    </div>
                </div>

            </div>  

            <div id='bottom'>
                <a href='addFlower.php' id='add_button'>Add more flowers</a>
            </div>
        </div>
    </body>


</html>