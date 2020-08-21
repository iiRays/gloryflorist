<?php

require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/Email.php");
require_once("../Controllers/Util/EmailFactory.php");

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

    static function addAttempt($email, $user) {
        if ($user != null) {
            $user->attempt += 1;
            R::store($user);
        }
    }

    static function clearAttempt($email, $user) {
        if (Session::isLoggedIn()) {
            $user->attempt = 0;
            R::store($user);
        }
    }

    static function disableAcc($email, $user) {
        if ($user != null && $user->attempt > 5) {
            $user->status = "invalid";
            R::store($user);
        }
    }

    static function forgetPass($email, $user) {
        // Generate random password
        $password = Quick::generateRandomString(10);
        $name = $user->name;
        $factory = new EmailFactory();
        $mail = $factory->build();
        $mail->send($email, "Forget Password Request.", "Hi, $name , we received your forget password request. Here is your new password." .
                " New Password : $password");

        $user->password = Password::hashPassword($password);
        R::store($user);
    }

}
