<?php

require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");



if(Session::isLoggedIn()){
    echo "logged in";
} else{
    echo "GUEST";
}

