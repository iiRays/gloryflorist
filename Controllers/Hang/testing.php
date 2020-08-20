<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$arr = array(1, 2, 3, 4);


foreach ($arr as $value) {
    $a = $value = $value * 2;
    array_push($arr, $a);
    echo 'haha=' .$arr .'</br>';
}
//after
echo $arr;


