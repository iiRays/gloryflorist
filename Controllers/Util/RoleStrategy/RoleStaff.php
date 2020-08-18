<?php

require_once 'RoleAlgorithm.php';

class RoleStaff implements RoleAlgorithm {

    public function role() {
        echo "Staff";
    }

}
