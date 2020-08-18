<?php

require_once 'RoleAlgorithm.php';

class RoleGuest implements RoleAlgorithm {

    public function role() {
        echo "Guest";
    }

}
