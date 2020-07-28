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
    
    static function getCurrentTime(){
        return (new DateTime())->setTimezone(new DateTimeZone("Asia/Kuala_Lumpur"));
    }
    
    static function getPostData($item){
        return isset($_POST[$item]) ? $_POST[$item] : null;
    }

}
