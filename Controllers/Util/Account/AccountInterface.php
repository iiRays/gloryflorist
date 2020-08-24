<?php
/**
 * @author Yong Haw Quan
 */
interface AccountInterface {
    //get data
    public function getName($currentAcc);
    public function getEmail($currentAcc);
    public function getPhone($currentAcc);
    public function getAddress($currentAcc);

    public function editName($currentAcc, $name);
    public function editPhone($currentAcc, $phone);
    public function editAddress($currentAcc, $address);
    public function editPassword($currentAcc, $password);
    
    
}
