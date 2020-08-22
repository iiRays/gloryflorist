<?php
require_once(__DIR__."/../Security/Authorize.php");


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
    
    static function getGetData($item){
        return isset($_GET[$item]) ? $_GET[$item] : null;
    }
    
    static function generateRandomString(int $length){
        $charPool = "01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        return substr(str_shuffle($charPool), 1, $length);
    }
    
    static function redirect(String $location){
        header("location: /GloryFlorist/$location");
    }
    
    static function printHeader($currentPage){
        
        // To see which one is current page
        $shop = $currentPage == "shop" ? "id='currentLink'" : ""; // if shop is selected, show it as current page. 
        $cart = $currentPage == "cart" ? "id='currentLink'" : "";
        $account = $currentPage == "account" ? "id='currentLink'" : "";
        $staffDashboard = $currentPage == "staffDashboard" ? "id='currentLink'" : "";
        
        // The buttons
        $shopButton = "<a href='viewFloral%28Cust%29.php' class='link' $shop>shop</a>";
        $accountButton = Authorize::isUserA("customer") ? "<a href='Account.php' class='link' $account>account</a>" : "";
        $staffDashboardButton = Authorize::isUserA("staff") ? "<a href='staffDashboard.php' class='link' $staffDashboard>dashboard</a>" : "";
        $logoutButton = Authorize::isUserA("customer") ? "<a href='logout.php' class='link'>logout</a>" : "";
        
        // Putting all buttons in the header
        $header = "<div id='hotbar'>
                <a href='home.php' id='glory'>glory florist</a>
                $shopButton
                <a href='cart.php' class='link' $cart>cart</a>
                $accountButton
                $staffDashboardButton
                $logoutButton
            </div>";
        
        echo $header;
    }

}
