<?php

class Session{
    
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
    
    public static function itemExists(String $key){
        if(isset($_SESSION[$key])){
            return true;
        }
        else{
            return false;
        }
    }
   
    
    public static function start(){
        if(session_id() == ""){
            session_start();
        }
    }
    
    public static function stop(){
        self::start();
        if(session_id() != ""){
            session_unset();
            session_destroy();
            session_write_close();
        }
    }
    
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
         if($user->sessionID != null){
           // This user has already logged in somewhere else
           // Solution: Make this user the active one
           
           // Stop the other login
           self::stopSpecificSession($user->sessionID);
           $user->sessionID = null;
       }
        
        // Add session ID (or replace if already have)
        self::start();
        
        $user->sessionID = session_id();
        self::set("user", $user);
        // Update session ID in user in the database
        R::store($user);  
        echo var_dump($user->sessionID);
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
        $user->sessionID = null;
        R::store($user);
    }
   
   public static function stopSpecificSession($id){
       session_id($id);
       session_start();
       session_unset();
       session_destroy();
       session_commit();
       return;
   }
}
