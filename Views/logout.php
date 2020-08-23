<?php
/**
 * @author Yong Haw Quan
 */
require_once("../Controllers/Util/Quick.php");
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Security/Session.php");
require_once("../Controllers/Util/DB.php");

DB::connect();

Session::logoutUser(Session::get("user"));
header('location: home.php');
