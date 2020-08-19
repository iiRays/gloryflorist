<?php
require_once("../Views/login.php");
class Password {
    
    static function hashPassword($password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;
    }
    
    static function passVerify($password1, $password2){
        $password = password_verify($password1, $password2);
        return $password;
    }
    
    static function disableAcc($user){
        $attempt = isset($_POST['login']);
        if($attempt > 5){
            $role = "invalid";
        } else {
            $attempt += 1;
        }
        
        return $role;
    }
}
