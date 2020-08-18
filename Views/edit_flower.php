<?php

include "../Controllers/Util/rb.php";
include "../Controllers/Util/DB.php";

DB::connect();

$id = $_POST['id'];
$name = $_POST['name'];
$remark = $_POST['remark'];
$imgLink = $_POST['flowerImgSrc'];

if (!empty($_POST['isAvailable'])) {
    $isAvailable = "true";
} else {
    $isAvailable = "false";
}

$flower = R::load("flower", $id);
$flower->flowerName = $name;
$flower->remark = $remark;
$flower->img = $imgLink;
$flower->isAvailable = $isAvailable;

R::storeAll([$flower]);

echo 'Edit Successfully';

$sql = "select * from arrangement where flower_id = " . $id;

$arrangement = R::getAll($sql);

$results = array();

foreach ($arrangement as $items) {
    foreach ($items as $item) {
        $results[] = $item;
    }
}
end($results);
$key = key($results);
for ($x = 0; $x <= $key; $x += 7) {
    $floralId = $results[$x];

    $arrangement = R::load("arrangement", $floralId);

    if ($isAvailable == "true") {
        $floralIsAvailable = "true";
    } else {
        $floralIsAvailable = "false";
    }
    $arrangement->isAvailable = $floralIsAvailable;
    R::storeAll([$arrangement]);
}
?>



