<?php

require_once 'RoleCustomer.php';
require_once 'Roles.php';

class Customer extends Roles {

    function __construct() {
        $this->setRoleAlgorithm(new RoleCustomer());
    }

}
