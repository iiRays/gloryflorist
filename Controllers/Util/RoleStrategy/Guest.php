<?php

require_once 'RoleGuest.php';
require_once 'Roles.php';

class Guest extends Roles {

    function __construct() {
        $this->setRoleAlgorithm(new RoleGuest());
    }

}
