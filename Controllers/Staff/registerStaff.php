<?php
//To handle uncaught errors
require_once __DIR__ . '/../Controllers/Security/Logger/LoggerFactory.php';
$logger = new LoggerFactory("UNCAUGHTERROR");
$logger->createLogger()->invalidLogger(null, null);

require_once("../Util/DB.php");
require_once("../Util/rb.php");
require_once("../Util/Quick.php");
require_once("../Util/Email.php");
require_once("../Security/Authorize.php");
require_once("../Security/Validator.php");
require_once("../Security/Password.php");

Authorize::onlyAllow("admin");

DB::connect();

//Get data from form
$email = Quick::getPostData("email");
$name = Quick::getPostData("name");

// Validate using Validator class
$validator = new Validator();
$validator->validateEmail($email);
$validator->validateName($name);

// Check for existing email
if (count(R::find("user", "role != ? AND email = ?", ["customer", $email])) > 0) {
    // Show error message
    $validator->customValidate("Another account already uses this email");
    
}

// Display errors
if(count($validator->getError())>0){
    $errorList = $validator->getError();
    $numOfErrors = count($errorList);
    $errorStr = "";
    
    while($numOfErrors > 0){
        $numOfErrors--;
        $error = array_pop($errorList);
        $errorStr .= array_pop($error);
        
        if($numOfErrors>0){
            // There's still more errors remaining
            $errorStr .= "|";
        }
    }
    
    // Redirect with error message
    Quick::redirect("/Views/registerStaff.php?errors=" . $errorStr);
    return;
}

// Generate random password
$password = Quick::generateRandomString(10);

//Create new staff data
// Password will be inputted by the new staff later
$user = R::dispense("user");
$user->email = $email;
$user->name = $name;
$user->role = "staff";
$user->status = "active";
$user->password = Password::hashPassword($password);
R::store($user);

// Proceed to send an email
Email::send($email, "Welcome to the workforce!", "Greetings, $name! You are the latest addition to our family at Glory Florist. A default password has been generated for you: <b>$password</b>. Please login and change it.<br/>"
        . "<a href='https://localhost/GloryFlorist/Views/home.php'> Navigate to the home page </a>");


// Show successful message
Quick::redirect("/Views/registerStaff.php?code=success");
