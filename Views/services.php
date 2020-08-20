<?php

require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Util/Email.php");
require_once("../Controllers/Util/EmailFactory.php");
require_once("../Controllers/Security/Password.php");

$errors = array();
//setting up database
DB::connect();

//when register button clicked
if (isset($_POST['register'])) {

    $name = Quick::getPostData("name");
    $email = Quick::getPostData("email");
    $password_1 = Quick::getPostData("password_1");
    $password_2 = Quick::getPostData("password_2");

    //validation
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1 || $password_2)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Password does not match");
    }

    // Check for existing email
    if (R::find("user", "email = ?", [$email])) {
        array_push($errors, "An account with this email already exists.");
    }

    if (count($errors) == 0) {
        $user = R::dispense("user");
        $user->email = $email;
        $user->password = Password::hashPassword($password_1);
        $user->name = "$name";
        $user->role = "customer";
        $user->status = "active";
        $user->phone = "";
        $user->address = "";
        $user->attempt = 0;

        R::store($user);
        header('location: login.php');
    }
}

//login
if (isset($_POST['login'])) {
//Get data from form
    $email = Quick::getPostData("email");
    $password = Quick::getPostData("password_1");
    $user = R::findOne("user", "email = ?", [$email]);


    //validation
    if (empty($email)) {
        array_push($errors, "Email is required");
    } else if ($user == null) {
        array_push($errors, "Email is incorrect");
    } else if ($user->status == "invalid") {
        array_push($errors, "Your account is locked due to exceeded login attempts.");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
        Password::addAttempt($email, $user);
        Password::disableAcc($email, $user);
    }


    if (count($errors) == 0) {
        $password = Password::passVerify($password, $user['password']);

        if ($user != null && $user->password == $password) {
            Session::loginUser($user);
            Password::clearAttempt($email, $user);
            header('location: home.php');
        } else {
            array_push($errors, "Wrong Email/Password");
        }
    }
}

if (isset($_POST['submitPassword'])) {
//Get data from form
    $email = Quick::getPostData("email");
    $user = R::findOne("user", "email = ?", [$email]);

    //validation
    if (empty($email)) {
        array_push($errors, "Email is required");
    } else if ($user == null) {
        array_push($errors, "Email is incorrect");
    }

    if (count($errors) == 0) {

        if ($user != null) {
            Password::forgetPass($email, $user);
            header('location: login.php');
        } else {
            array_push($errors, "Unrecognize Email");
        }
    }
}
?>
