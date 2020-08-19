<?php

class DB{
    public static function connect(){
        // Check if redbeanphp is already setup
        if (!R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=flowerdb', 'root', '');
        }
    }
}

