<?php
/**
 * @author Yong Haw Quan
 */
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Security/Password.php");

$errors = array();
DB::connect();

$currentAccount = Session::get("user");
$name = $currentAccount["name"];
$email = $currentAccount["email"];
$phone = $currentAccount["phone"];
$address = $currentAccount["address"];


if (isset($_POST['btnDone'])) {

    $name = Quick::getPostData("name");
    $phone = Quick::getPostData("phone");
    $address = Quick::getPostData("address");
    $password_1 = Quick::getPostData("password_1");
    $password_2 = Quick::getPostData("password_2");
    $user = R::findOne("user", "email = ?", [$email]);

    //validation
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    $output1 = "";
    $cp1 = Password::checkPassword($password_1, $password_2, $output1);
    if ($password_1 || $password_2 != "") {
        if ($cp1 != "") {
            array_push($errors, $cp1);
        }
    }

    if ($password_1 != $password_2) {
        array_push($errors, "Password does not match");
    }
    $output2 = "";
    $cp2 = Password::oldPassword($password_1, $user, $output2);
    if ($password_1 != "") {
        if ($cp2 != "") {
            array_push($errors, $cp2);
        }
    }

    if (count($errors) == 0) {

        if ($password_1 && $password_2 != "") {

            $user = Session::get("user");
            $user->name = $name;
            $user->phone = $phone;
            $user->address = $address;
            $user->password = Password::hashPassword($password_1);

            R::store($user);
            header('location: Account.php');
        } else {

            if (count($errors) == 0) {
                $user = Session::get("user");
                $user->name = $name;
                $user->phone = $phone;
                $user->address = $address;

                R::store($user);
                header('location: Account.php');
            }
        }
    }
}
if (isset($_POST['btnCancel'])) {

    header('location: Account.php');
}