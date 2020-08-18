<?php

require_once 'RoleStaff.php';
require_once 'Roles.php';

class Staff extends Roles {

    function __construct() {
        $this->setRoleAlgorithm(new RoleStaff());
    }

}
