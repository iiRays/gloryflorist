<?php

/**
 * @author Yong Haw Quan
 */
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Security/Password.php");
require_once ('../Controllers/Util/Account/AccountAdapter.php');

$errors = array();
DB::connect();

$currentAccount = Session::get("user");
$user = new AccountAdapter();
$name = $user->getName($currentAccount);
$email = $user->getEmail($currentAccount);
$phone = $user->getPhone($currentAccount);
$address = $user->getAddress($currentAccount);


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
            $user = new AccountAdapter();
            $user->editName($currentAccount, $name);
            $user->editPhone($currentAccount, $phone);
            $user->editAddress($currentAccount, $address);
            $user->editPassword($currentAccount, Password::hashPassword($password_1));
            header('location: Account.php');
        } else {

            if (count($errors) == 0) {
                $user = new AccountAdapter();
                $user->editName($currentAccount, $name);
                $user->editPhone($currentAccount, $phone);
                $user->editAddress($currentAccount, $address);

                header('location: Account.php');
            }
        }
    }
}
if (isset($_POST['btnCancel'])) {

    header('location: Account.php');
}