<?php

// Author : Johann Lee Jia Xuan

//require_once(__DIR__ . "/../Util/Cart.php");
require_once(__DIR__ . "/../Util/CartSaver.php");
require_once(__DIR__ . "/../Util/CartAdapter.php");

class Session {

    // Starts a session if none exists
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Stops a session if one exists
    public static function stop() {
        self::start();
        if (session_id() != "") {
            session_unset();
            session_destroy();
        }
    }

    public static function get(String $key) {
        self::start();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public static function set(String $key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function delete(String $key) {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function itemExists(String $key) {
        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }

    // Checks whether a user is logged in
    public static function isLoggedIn() {
        self::start();
        if (isset($_SESSION["user"])) {
            return true;
        } else {
            return false;
        }
    }

    public static function loginUser($user) {

        // If this user already logged in somewhere else
        if ($user->sessionToken != null) {
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

        // RYAN'S WORK
        $cartAdapter = new CartAdapter();
        $cartSaver = new CartSaver();

        self::set("cartAdapter", $cartAdapter);
        self::set("cartSaver", $cartSaver);
    }

    public static function logoutUser($user) {
        // Do not logout user if there's no user to log out
        if (!self::isLoggedIn()) {
            return;
        }

        self::start();
        // Kill the session
        self::stop();

        //Remove session ID in the database
        $user->sessionToken = null;
        R::store($user);
    }

    public static function stopSpecificSession($id) {
        $currentSessionID = session_id();
        session_commit();

        session_id($id);
        self::start();
        session_unset();
        session_destroy();

        session_id($currentSessionID);
        self::start();
        session_commit();
    }

    // Logout the user based on ID
    public static function logoutRemoteUser($id) {
        $user = R::load("user", $id);

        // If this user exists in DB and is logged in
        if ($user && $user->sessionToken) {
            // Stop his session
            self::stopSpecificSession($user->sessionToken);
            $user->sessionToken = null;
            R::store($user);
        }
    }

}
