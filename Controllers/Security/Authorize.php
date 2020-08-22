<?php
require_once(__DIR__ .'\..\Util\Quick.php');
require_once("Session.php");
require_once(__DIR__ .'\..\Util\rb.php');


/**
 * To permit certain users only
 *
 * @author Johann Lee Jia Xuan
 */
class Authorize {

    public static function onlyAllow($role) {
        $user = Session::get("user");
        
        if($role == "guest" && $user) {// Only allow guests
                Quick::redirect("Views/home.php");
        } else if (($role == "customer" || $role == "admin" || $role == "staff") && !$user) { // If only allow logged in users
            // Block guests
            return Quick::redirect("Views/login.php");
        } else if ($role == "staff" && $user->role != "staff" && $user->role != "admin") { // If only allow staff AND admin
            // Block customers AND guests
             Quick::redirect("Views/home.php");
        } else if ($role == "admin" && $user->role != "admin") { // If only allow admin
            // Block customers AND guests AND other staff
             Quick::redirect("Views/home.php");
        } else{ 
            return;
            // Authorized
        }
    }
    
    public static function isUserA($role){
        $user = Session::get("user");
        if($role == "guest" && $user) {// Only allow guests
                return false;
        } else if (($role == "customer" || $role == "admin" || $role == "staff") && !$user) { // If only allow logged in users
            // Block guests
            return false;
        } else if ($role == "staff" && $user->role != "staff" && $user->role != "admin") { // If only allow staff AND admin
            // Block customers AND guests
             return false;
        } else if ($role == "admin" && $user->role != "admin") { // If only allow admin
            // Block customers AND guests AND other staff
             return false;
        } else{ 
            return true;
            // Authorized
        }
    }

}
