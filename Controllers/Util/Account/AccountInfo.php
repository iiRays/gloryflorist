<?php

/**
 * @author Yong Haw Quan
 */
require_once ("../Controllers/Util/rb.php");
require_once ("../Controllers/Util/DB.php");

DB::connect();

class AccountInfo {

    public function getName($currentAcc) {
        if (!empty($currentAcc)) {
            return $currentAcc->name;
        }
    }

    public function getEmail($currentAcc) {
        if (!empty($currentAcc)) {
            return $currentAcc->email;
        }
    }

    public function getPhone($currentAcc) {
        if (!empty($currentAcc)) {
            return $currentAcc->phone;
        }
    }

    public function getAddress($currentAcc) {
        if (!empty($currentAcc)) {
            return $currentAcc->address;
        }
    }

    public function editName($currentAcc, $name) {
        if (!empty($currentAcc)) {
            $currentAcc->name = $name;
            R::store($currentAcc);
        }
    }

    public function editAddress($currentAcc, $address) {
        if (!empty($currentAcc)) {
            $currentAcc->address = $address;
            R::store($currentAcc);
        }
    }

    public function editPhone($currentAcc, $phone) {
        if (!empty($currentAcc)) {
            $currentAcc->phone = $phone;
            R::store($currentAcc);
        }
    }

    public function editPassword($currentAcc, $password) {
        
        if (!empty($currentAcc)) {
            $currentAcc->password = $password;
            R::store($currentAcc);
        }
    }
}
