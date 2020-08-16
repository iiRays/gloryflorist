<?php
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");

DB::connect();

//Get data from form
$email = Quick::getPostData("email");
$password = Quick::getPostData("password");

//Get from DB
$user = R::find("user", "email = ?", [$email])[1];

//Authenticate
if($user == null){
    //No user found
    echo "No user found";
}else{
    //Compare password
    if($user->password == $password){
        
        Session::loginUser($user);
    }
    else{
        echo "incorrect password";
    }
}
