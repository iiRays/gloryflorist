<?php
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");

$errors = array();
//setting up database
DB::connect();

//when register button clicked
if (isset($_POST['register'])) {
    $role = Quick::getPostData("role");
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

    if (count($errors) == 0) {
        $user = R::dispense("users");
        $user->email = $email;
        $user->password = "$password_1";
        $user->name = "$name";
        $user->role = "$role";
        $user->status = "active";

        R::store($user);
        header('location: login.php');
    }
}

//login
if (isset($_POST['login'])) {
//Get data from form
    $email = Quick::getPostData("email");
    $password = Quick::getPostData("password_1");

    $users = R::findOne("users", "email = ?", [$email]);
    
    //validation
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        if ($users->password == $password) {
            Session::loginUser($users);
            header('location: home.php');
        } else {
            array_push($errors, "Wrong Email/Password");
        }
    }
}
 
//logout
if (isset($_GET['logout'])) {
    Session::logoutUser(Session::get("user"));
    header('location: home.php');
}
?>