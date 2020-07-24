<?php

class Quick {

    static function getQueryStr() {
        parse_str($_SERVER["QUERY_STRING"], $result);
        return $result;
    }
    
    static function getSpecificQuery(String $query) {
        parse_str($_SERVER["QUERY_STRING"], $result);
        return $result[$query];
    }

}
