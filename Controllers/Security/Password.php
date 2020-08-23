<?php

require_once __DIR__ . '/../../Controllers/Util/rb.php';
require_once __DIR__ . '/../../Controllers/Util/DB.php';
require_once __DIR__ . '/../../Controllers/Security/Session.php';
//try to logging all the validation success and failure
require_once __DIR__ . '\..\Security\logger\LoggerFactory.php';

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
        } else if (!preg_match("#[0-9]+#", $pwd1) || !preg_match("#[0-9]+#", $pwd2)) {
            $output = "Password must include at least one number!";
        } else if (!preg_match("#[a-zA-Z]+#", $pwd1) || !preg_match("#[a-zA-Z]+#", $pwd2)) {
            $output = "Password must include at least one letter!";
        }

        //logging here...
        //get file and line info that call this function
        $fileinfo = 'no_file_info';
        $backtrace = debug_backtrace();
        if (!empty($backtrace[0]) && is_array($backtrace[0])) {
            $fileinfo = $backtrace[0]['file'] . ":" . $backtrace[0]['line'];
        }

        //instantiate the loggerFactory
        $e = new LoggerFactory("INPUTVALIDATION");
        //if the $output != '', means got error = invalid validation then
        if ($output != '') {
            $e->createLogger()->invalidLogger($output, $fileinfo);
        } else {
            //else $output == '', means no error = valid validation then
            //pass null to first parameter because we not catch exception here...
            $e->createLogger()->validLogger($output, $fileinfo);
        }

        return $output;
    }

    static function oldPassword($pwd1, $user, $output) {
        $password = self::passVerify($pwd1, $user['password']);
        if ($password) {
            $output = "Password same with current account password";
        } else {
            
        }
        return $output;
    }

    static function addAttempt($user) {
        if ($user != null) {
            $user->attempt += 1;
            R::store($user);
        }

        //logging here...
        //get file and line info that call this function
        $fileinfo = 'no_file_info';
        $backtrace = debug_backtrace();
        if (!empty($backtrace[0]) && is_array($backtrace[0])) {
            $fileinfo = $backtrace[0]['file'] . ":" . $backtrace[0]['line'];
        }

        //instantiate the loggerFactory
        $e = new LoggerFactory("AUTHENTICATION");
        //log the addattempt activity
        $e->createLogger()->invalidLogger($user . "[action]=> addAttempt", $fileinfo);
        //log the tempering activity to user attempt
        $e = new LoggerFactory("TEMPERINGEVENT");
        $e->createLogger()->invalidLogger($user . "[action]=> addAttempt", $fileinfo);
    }

    static function clearAttempt($user) {
        if (Session::isLoggedIn()) {
            $user->attempt = 0;
            R::store($user);
        }

        //logging here...
        //get file and line info that call this function
        $fileinfo = 'no_file_info';
        $backtrace = debug_backtrace();
        if (!empty($backtrace[0]) && is_array($backtrace[0])) {
            $fileinfo = $backtrace[0]['file'] . ":" . $backtrace[0]['line'];
        }

        //instantiate the loggerFactory
        $e = new LoggerFactory("AUTHENTICATION");
        //log the addattempt activity
        $e->createLogger()->validLogger($user . "[action]=> clearAttempt", $fileinfo);
        //log the tempering activity to user attempt
        $e = new LoggerFactory("TEMPERINGEVENT");
        $e->createLogger()->validLogger($user . "[action]=> clearAttempt", $fileinfo);
    }

    static function disableAcc($user) {

        if ($user != null && $user->attempt > 5) {
            $user->status = "invalid";
            R::store($user);
        }
        //logging here...
        //get file and line info that call this function
        $fileinfo = 'no_file_info';
        $backtrace = debug_backtrace();
        if (!empty($backtrace[0]) && is_array($backtrace[0])) {
            $fileinfo = $backtrace[0]['file'] . ":" . $backtrace[0]['line'];
        }

        //instantiate the loggerFactory
        $e = new LoggerFactory("AUTHENTICATION");
        //log the addattempt activity
        $e->createLogger()->invalidLogger($user . "[action]=> disableAcc", $fileinfo);
        //log the tempering activity to user attempt
        $e = new LoggerFactory("TEMPERINGEVENT");
        $e->createLogger()->invalidLogger($user . "[action]=> disableAcc", $fileinfo);
    }

    static function activateAccMail($user) {
        $random = Quick::generateRandomString(10);
        
        $user->status = "locked";
        $user->recovery = $random;
        R::store($user);
        
        Email::send($user->email, "Account Unlock Mail", "Hi, $user->name , due to multiple failed login attempt, account is now LOCKED. This is an account recovery mail." .
                " Click <a href='https://localhost/GloryFlorist/Views/unlockAccount.php'>HERE</a> to unlock your account. Recovery code : $random");
    }
    
    static function activateAcc($user) {
        $user->status = "active";
        $user->attempt = 0;
        R::store($user);
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
