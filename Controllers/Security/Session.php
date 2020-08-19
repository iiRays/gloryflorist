<?php

// Author : Johann Lee Jia Xuan

require_once("../Controllers/Util/Cart.php");
require_once("../Controllers/Util/CartSaver.php");

class Session{
    
    // Starts a session if none exists
    public static function start(){
        if(session_id() == ""){
            session_start();
        }
    }
    
    // Stops a session if one exists
    public static function stop(){
        self::start();
        if(session_id() != ""){
             //session_regenerate_id(true);
            session_unset();
            session_destroy();
        }
    }
    
    public static function get(String $key){
        self::start();
        if(isset($_SESSION[$key])){
             return $_SESSION[$key];
        }
        else{
            return null;
        }
       
    }
    
    public static function set(String $key, $value){
        self::start();
         $_SESSION[$key] = $value;
    }
    
    public static function delete(String $key) {
        self::start();
        unset($_SESSION[$key]);
    }
    
    public static function itemExists(String $key){
        if(isset($_SESSION[$key])){
            return true;
        }
        else{
            return false;
        }
    }
    
    // Checks whether a user is logged in
    public static function isLoggedIn(){
        self::start();
        if(isset($_SESSION["user"])){
             return true;
        }
        else{
            return false;
        }
    }
    
    public static function loginUser($user){
        
        // If this user already logged in somewhere else
         if($user->sessionToken != null){
           // This user has already logged in somewhere else
           // Solution: Make this user the active one
           
           // Stop the other login
           self::stopSpecificSession($user->sessionToken);
          
           $user->sessionToken = null;
       }
        
        self::start();
        
        // New session ID
        session_regenerate_id(true);
        $user->sessionToken = session_id();
        self::set("user", $user);
        echo "New session: " . session_id();
        
        // Update session ID in user in the database
        R::store($user);
        
        $cart = new Cart(); // Ryan's work
        $cartSaver = new CartSaver(); // Ryan's work
        
        // DEBUG: simulate items already added to cart
        $cart->addItem("1", 3);
        $cart->addItem("2", 5);
        
        self::set("cart", $cart); // Ryan's work
        self::set("cartSaver", $cartSaver); // Ryan's work
    }
    
    public static function logoutUser($user){
        // Do not logout user if there's no user to log out
        if(!self::isLoggedIn()){
            return;
        }
        
        self::start();
        // Kill the session
        self::stop();
        
        //Remove session ID in the database
        $user->sessionToken = null;
        R::store($user);
    }
   
   public static function stopSpecificSession($id){
        echo "Stopping session " . $id . "<br/>";
        
       session_id($id);
       session_start();
       session_unset();
       
       session_destroy();
   }
}