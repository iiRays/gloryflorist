<?php

require_once 'RoleAlgorithm.php';

class RoleAdmin implements RoleAlgorithm {

    public function role() {
        echo "Admin";
    }

}
