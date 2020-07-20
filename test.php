<?php
include "Controllers/Util/DB.php";
include "Controllers/Util/rb.php";



R::setup('mysql:host=localhost;dbname=gloryfloristdb', 'root', ''); //for both mysql or mariaDB
$flower = R::find("flora", "flower_id = ?", ['TEST']);
echo $flower[1]->flowerName;
