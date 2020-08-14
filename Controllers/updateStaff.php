<?php

require_once("Util/Quick.php");
require_once("Util/rb.php");

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB

$staffCount = (int) Quick::getPostData("staffCount");


for ($i = 1; $i <= $staffCount; $i++) {
    $staffId = (int) Quick::getPostData("staffId_" . $i);
    $formStaffStatus = Quick::getPostData("isActive_" . $i);

    $newStatus = $formStaffStatus == null ? "inactive" : "active";
    
    // Check if this staff has any changes
    $staff = R::load("user", $staffId);

    if ($staff->status != $newStatus) {
        // Changes detected
        echo $staff->id . " status has changed";

        // Store a changelog object (not entity class)
        $changelog = R::dispense("changelog");
        $changelog->account = "[$staff->id] $staff->name";
        $changelog->newStatus = $newStatus;

        // Update the staff in db
        $staff->status = $newStatus;

       R::storeAll([$changelog, $staff]);
    }

    
}

//Redirect
    header("Location: ../Views/viewStaff.php");
    return;