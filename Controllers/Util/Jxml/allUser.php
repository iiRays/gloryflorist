<?php

class allUser {

    private $id;
    private $name;
    private $email;
    private $phone;
    private $address;
    private $role;
    private $status;

    function __construct($id, $name, $email, $phone, $address, $role, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->role = $role;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getRole() {
        return $this->role;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    
    public function __toString() {
        return '<tr><td>' . $this->id . '</td>'
                . '<td>' . $this->name . '</td>'
                . '<td>' . $this->email . '</td></tr>'
                . '<td>' . $this->phone . '</td>'
                . '<td>' . $this->address . '</td>'
                . '<td>' . $this->role . '</td>'
                . '<td>' . $this->status . '</td></tr>';
    }

}
