<?php

require_once 'RoleAlgorithm.php';

class RoleCustomer implements RoleAlgorithm {

    public function role() {
        echo "Customer";
    }

}
