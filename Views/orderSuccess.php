<?php
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("customer");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Cart</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/orderSuccess.css">
    </head>
    <body>

    <div id='container'>

      <div id='hotbar'>
        <a href='#' id='glory'>glory florist</a>
        <a href='#' class='link' id='currentLink'>shop</a>
        <a href='#' class='link'>cart</a>
        <a href='#' class='link'>account</a>
      </div>

      <div id='top'>
        <div id='content'>
          <a href='home.php' id='back'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;back home</a>
          <a id='title'>Order Successful!</a>
        </div>
      </div>

    </div>

    </body>
</html>
