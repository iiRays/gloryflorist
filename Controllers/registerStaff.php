<?php

require_once("Util/DB.php");
require_once("Util/rb.php");
require_once("Util/Quick.php");
require_once("Util/Email.php");

DB::connect();

//Get data from form
$email = Quick::getPostData("email");
$name = Quick::getPostData("name");

//Create new staff data
// Password will be inputted by the new staff later
$user = R::dispense("user");
$user->email = $email;
$user->name = $name;
$user->role = "staff";
$user->status = "inactive";
R::store($user);

Email::send($email, "Welcome to the workforce!", "Greetings, $name! You are the latest addition to our family at Glory Florist. To complete your staff account registration, proceed to this link: <a href='https://localhost/GloryFlorist/Views/staffDashboard'> click me </a>");


// Show successful message