<?php

require_once("Util/DB.php");
require_once("Util/rb.php");
require_once("Util/Quick.php");
require_once("Util/Email.php");
require_once("Util/EmailFactory.php");

DB::connect();

//Get data from form
$email = Quick::getPostData("email");
$name = Quick::getPostData("name");

// Generate random password
$password = Quick::generateRandomString(10);

//Create new staff data
// Password will be inputted by the new staff later
$user = R::dispense("user");
$user->email = $email;
$user->name = $name;
$user->role = "staff";
$user->status = "inactive";
$user->password = $password;
R::store($user);

// Proceed to send an email
$factory = new EmailFactory();
$mail = $factory->build();
$mail->send($email, "Welcome to the workforce!", "Greetings, $name! You are the latest addition to our family at Glory Florist. A default password has been generated for you: <b>$password</b>. Please login and change it.<br/>"
        . "<a href='https://localhost/GloryFlorist/Views/home.php'> Navigate to the home page </a>");


// Show successful message