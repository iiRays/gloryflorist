<?php
// Author: Johann Lee Jia Xuan

//To handle uncaught errors
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';
$logger = new LoggerFactory;
$logger = $logger->createLogger("UNCAUGHTERROR");
$logger->invalidLogger(null, null);

require_once("../Controllers/Security/Authorize.php");
require_once("../Controllers/Util/Quick.php");
Authorize::onlyAllow("admin");
?>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Glory Florist : Staff Register</title>
    <link rel="stylesheet" href="CSS/common.css">
    <link rel="stylesheet" href="CSS/registerStaff.css">
  </head>

  <body>
    <div id='container'>
      <!-- <form id='container'> ??? -->

      <?php Quick::printHeader("staffDashboard") ?>


      <div id='top'>
        <div id='text'>
          <a href='staffDashboard.php' id='back'>back &nbsp; to dashboard</a>
          <a id='title'>Register a Staff</a>
        </div>
      </div>
      <div id="content">    
          <form action="../Controllers/Staff/registerStaff.php" method="POST">
              
          <div class="message" style="font-size: 35;"></div>

          <div class="field">
            <h4 class="label">NAME</h4>
            <input type="text" name="name">
          </div>
          <div class="field">
            <h4 class="label">EMAIL</h4>
            <input type="text" name="email" >
          </div>
          <input type="submit" value="REGISTER"/>
        </form>
      </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      var message = "";
      
    // Code possible thanks to https://stackoverflow.com/questions/19491336/how-to-get-url-parameter-using-jquery-or-plain-javascript
    function getQueryString(query) {
      var pageURL = window.location.search.substring(1);
      var variables = pageURL.split('&');
      var key;

      for (var i = 0; i < variables.length; i++) {
        key = variables[i].split('=');

        if (key[0] === query) {
          return key[1] === undefined ? true : decodeURIComponent(key[1]);
        }
      }
    }

    $(document).ready(function() {
      var returnCode = getQueryString("code");
      var errors = getQueryString("errors");
      var color = "";

      switch (returnCode) {
        case "success":
          message = "Registered successfully!";
          color = "lightgreen";
          break;
      }
      
      if(errors){
          var errorList = errors.split("|");
         errorList.forEach(addErrors);
          
          color = "red";
      }

      $(".message").html(message);
      $(".message").css("color", color);
    });
    
    function addErrors(error, index){
        message += error + "<br/>";
        
        return message;
    }

  </script>

</html>
