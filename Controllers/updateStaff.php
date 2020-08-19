<?php

require_once("Util/Quick.php");
require_once("Util/rb.php");
require_once("Security/Session.php");
require_once("Security/Authorize.php");

Authorize::onlyAllow("admin");

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB

$staffCount = (int) Quick::getPostData("staffCount");


for ($i = 1; $i <= $staffCount; $i++) {
    $staffId = (int) Quick::getPostData("staffId_" . $i);
    $formStaffStatus = Quick::getPostData("isActive_" . $i);
    $formStaffRole = Quick::getPostData("isAdmin_" . $i);

    $newStatus = $formStaffStatus == null ? "inactive" : "active";
    $newRole = $formStaffRole == null ? "staff" : "admin";

    // Check if this staff has any changes
    $staff = R::load("user", $staffId);

    //Detect value changes
    $roleChanged = false;
    $statusChanged = false;

    // Did the status change?
    if ($staff->status != $newStatus && $staff->id != Session::get("user")->id) {
        $statusChanged = true;
        
        // Store a changelog object (not entity class)
        $changelog = R::dispense("changelog");
        $changelog->account = "[$staff->id] $staff->name";
        $changelog->newData = $newStatus;
        R::store($changelog);
        
        // Update staff
        $staff->status = $newStatus;
    }
    
    // Did the role change?
    if($staff->role != $newRole && $staff->id != Session::get("user")->id){
        $roleChanged = true;
        
        // Store a changelog object (not entity class)
        $changelog = R::dispense("changelog");
        $changelog->account = "[$staff->id] $staff->name";
        $changelog->newData = $newRole;
        R::store($changelog);
        
         // Update staff
        $staff->role = $newRole;
    }

    // Did any change occur?
    if ($roleChanged || $statusChanged) {
        // Update the staff in db
        R::store($staff);
    }
    
}

//Redirect
header("Location: ../Views/viewStaff.php");
return;



