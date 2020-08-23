<?php
/**
 * @author Yong Haw Quan
 */
interface AccountInterface {
    //get data
    public function getName($id);
    public function getEmail($id);
    public function getPhone($id);
    public function getAddress($id);

    public function editName($id, $name);
    public function editPhone($id, $phone);
    public function editAddress($id, $address);
    public function editPassword($id, $password);
    
    
}
