<?php
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");

$errors = array();
DB::connect();

$currentAccount = Session::get("user");
$name = $currentAccount["name"];
$email = $currentAccount["email"];
$phone = $currentAccount["phone"];
$address = $currentAccount["address"];


if (isset($_POST['btnDone'])) {

    $name = Quick::getPostData("name");
    $email = Quick::getPostData("email");
    $phone = Quick::getPostData("phone");
    $address = Quick::getPostData("address");

    //validation
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (count($errors) == 0) {
        $user = Session::get("user");
        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        
        R::store($user);
        header('location: Account.php');
    }
}