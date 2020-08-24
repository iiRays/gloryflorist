<?php
/**
 * @author Yong Haw Quan
 */
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Util/Email.php");
require_once("../Controllers/Security/Password.php");
require_once __DIR__ . '\..\Security\Logger\LoggerFactory.php';
$logger = new LoggerFactory;
$logger = $logger->createLogger("UNCAUGHTERROR");
$logger->invalidLogger(null, null);
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
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        array_push($errors, "Name:letters and space only");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email format: you@mail.com");
    }
    if (empty($password_1 && $password_2)) {
        array_push($errors, "Password is required");
    }
    $output = "";
    $cp = Password::checkPassword($password_1, $password_2, $output);
    if ($cp != "") {
        array_push($errors, $cp);
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
        $user->password = Password::hashPassword($password_1); //hash password
        $user->name = "$name";
        $user->role = "customer";
        $user->status = "active";
        $user->phone = "";
        $user->address = "";
        $user->attempt = 0;
        $user->recovery = "";
        //store user information
        R::store($user);
        //send email to registered user through email
        Email::send($email, "Welcome to Glory Florist !", "Hi $name ! Thanks for signing up to Glory Florist. Hope you have a fragrant day!"
                . "Click <a href='https://localhost/GloryFlorist/Views/home.php'>HERE</a> to navigate to our website! ");
        header('location: login.php');
    }
}

//when login button is clicked
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
    } else if ($user->status == "inactive") {
        array_push($errors, "This account is deactivated.");
    } else if ($user->status == "invalid") {
        array_push($errors, "Your account is locked (Too many attempt). Recovery email sending.");
        Password::activateAccMail($user);
    } else if ($user->status == "locked") {
        array_push($errors, "Your account is locked (Too many attempt). Email was sent.");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
        Password::addAttempt($user);
        Password::disableAcc($user);
    }

    //if no more errors occur
    if (count($errors) == 0) {
        $password = Password::passVerify($password, $user['password']);

        if ($user != null && $password) {
            Session::loginUser($user);
            Password::clearAttempt($user);
            header('location: home.php');
        } else {
            array_push($errors, "Wrong Email/Password");
            Password::addAttempt($user);
            Password::disableAcc($user);
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

if (isset($_POST['submitCode'])) {
//Get data from form
    $rCode = Quick::getPostData("rCode");
    $user = R::findOne("user", "recovery = ?", [$rCode]);

    //validation
    if ($rCode == "") {
        array_push($errors, "Recovery code required");
    } else if ($user == null) {
        array_push($errors, "No such recovery code");
    }

    if (count($errors) == 0) {

        if ($user != null) {
            Password::activateAcc($user);
            header('location: login.php');
        } else {
            array_push($errors, "Unrecognize Code");
        }
    }
}
?>
