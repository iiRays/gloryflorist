<?php
/**
 * @author Yong Haw Quan
 */
require_once 'Guest.php';
require_once 'Customer.php';
require_once 'Staff.php';
require_once 'Admin.php';
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");

$guest = new Guest();
$customer = new Customer();
$staff = new Staff();
$admin = new Admin();

$cAccount = Session::get("user");
$roles = $cAccount["role"];

if ($roles == "customer") { // If only allow logged in users
    $role = $customer;
    $role->role();
} else if ($roles == "staff") { // If only allow staff AND admin
    $role = $staff;
    $role->role();
} else if ($roles == "admin") { // If only allow admin
    $role = $admin;
    $role->role();
} else {
    $role = $guest;
    $role->role();
}




