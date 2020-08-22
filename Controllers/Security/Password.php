<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Security/Session.php");


DB::connect();

class Password {

    static function hashPassword($password) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;
    }

    static function passVerify($password1, $password2) {
        $password = password_verify($password1, $password2);
        return $password;
    }

    static function checkPassword($pwd1, $pwd2, $output) {

        if (strlen($pwd1) < 6 || strlen($pwd2) < 6) {
            $output = "Password too short! At least 6.";
        }else if (!preg_match("#[0-9]+#", $pwd1) || !preg_match("#[0-9]+#", $pwd2)) {
            $output = "Password must include at least one number!";
        }else if (!preg_match("#[a-zA-Z]+#", $pwd1) || !preg_match("#[a-zA-Z]+#", $pwd2)) {
            $output = "Password must include at least one letter!";
        }
        
        return $output;
    }
    
    static function oldPassword($pwd1, $user, $output) {
        $password = self::passVerify($pwd1, $user['password']);
        if ($password) {
            $output = "Password same with current account password";
        }else{
            
        }
        return $output;
    }
    
    static function addAttempt($user) {
        if ($user != null) {
            $user->attempt += 1;
            R::store($user);
        }
    }

    static function clearAttempt($user) {
        if (Session::isLoggedIn()) {
            $user->attempt = 0;
            R::store($user);
        }
    }

    static function disableAcc($user) {
        if ($user != null && $user->attempt > 5) {
            $user->status = "invalid";
            R::store($user);
        }
    }

    static function forgetPass($email, $user) {
        // Generate random password
        $password = Quick::generateRandomString(10);
        $name = $user->name;
        
        Email::send($email, "Forget Password Request.", "Hi, $name , we received your forget password request. Here is your new password." .
                " New Password : $password");

        $user->password = Password::hashPassword($password);
        R::store($user);
    }

}
