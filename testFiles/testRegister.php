<?php
include "../Controllers/Util/Quick.php";
include "../Controllers/Util/rb.php";

R::setup('mysql:host=localhost;dbname=flowerdb', 'root', ''); //for both mysql or mariaDB

//Dummy user
$user = R::dispense("user");
$user->email="user@mail.com";
$user->password="123";
$user->name="Johann";
$user->role="customer";
$user->status="active";

R::store($user);