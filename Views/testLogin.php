<?php
include "../Controllers/Util/Quick.php";
include "../Controllers/Util/rb.php";

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB

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
        echo "Login successful";
    }
    else{
        echo "incorrect password";
    }
}
