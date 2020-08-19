<?php

require_once 'RoleAlgorithm.php';

abstract class Roles {

    private $roleAlgorithm;

    function getRoleAlgorithm() {
        return $this->roleAlgorithm;
    }

    function setRoleAlgorithm($roleAlgorithm) {
        $this->roleAlgorithm = $roleAlgorithm;
    }

    function role() {
        $this->roleAlgorithm->role();
    }

}
