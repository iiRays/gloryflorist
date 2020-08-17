<?php
require_once("../Controllers/Util/Quick.php");
require_once("Session.php");
require_once("../Controllers/Util/rb.php");


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
        } else if ($role == "customer" && !$user) { // If only allow customers
            // Block guests
            Quick::redirect("Views/home.php");
        } else if ($role == "staff" && $user->role != "staff") { // If only allow staff
            // Block customers AND guests
             Quick::redirect("Views/home.php");
        } else { 
            return;
            // Authorized
        }
    }

}
