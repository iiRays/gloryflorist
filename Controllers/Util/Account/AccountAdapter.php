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

    public function editAddress($id, $address) {
        $this->user->editAddress($id, $address);
    }

    public function editName($id, $name) {
        $this->user->editName($id, $name);
    }

    public function editPassword($id, $password) {
        $this->user->editPassword($id, $password);
    }

    public function editPhone($id, $phone) {
        $this->user->editPhone($id, $phone);
    }

    public function getAddress($id) {
        return $this->user->getAddress($id);
    }

    public function getEmail($id) {
        return $this->user->getEmail($id);
    }

    public function getName($id) {
        return $this->user->getName($id);
    }

    public function getPhone($id) {
        return $this->user->getPhone($id);
    }

}
