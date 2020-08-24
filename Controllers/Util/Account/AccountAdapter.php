<?php

/**
 * @author Yong Haw Quan
 */
require_once ("AccountInterface.php");
require_once ("AccountInfo.php");

class AccountAdapter implements AccountInterface {

    private $user;

    public function __construct() {
        $this->user = new AccountInfo();
    }

    public function editAddress($currentAcc, $address) {
        $this->user->editAddress($currentAcc, $address);
    }

    public function editName($currentAcc, $name) {
        $this->user->editName($currentAcc, $name);
    }

    public function editPassword($currentAcc, $password) {
        $this->user->editPassword($currentAcc, $password);
    }

    public function editPhone($currentAcc, $phone) {
        $this->user->editPhone($currentAcc, $phone);
    }

    public function getAddress($currentAcc) {
        return $this->user->getAddress($currentAcc);
    }

    public function getEmail($currentAcc) {
        return $this->user->getEmail($currentAcc);
    }

    public function getName($currentAcc) {
        return $this->user->getName($currentAcc);
    }

    public function getPhone($currentAcc) {
        return $this->user->getPhone($currentAcc);
    }

}
