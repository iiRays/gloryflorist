<?php

require_once 'RoleAdmin.php';
require_once 'Roles.php';

class Admin extends Roles {

    function __construct() {
        $this->setRoleAlgorithm(new RoleAdmin());
    }

}
