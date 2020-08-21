<!DOCTYPE html>
<?php
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/DB.php");

DB::connect();

$arrangement = R::findAll('arrangement');
?>
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewFloral(Cust).css">
        <title>Glory Florist : Floral Arrangement Available</title>
    </head>
    <body>
        <div id='container'> 

            <div id='hotbar'>
                <a href='#' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='#' class='link'>cart</a>
                <a href='#' class='link' >account</a>
                <a href='#' class='link' id='currentLink'>dashboard</a>
            </div>

            <div id='top'>
                <div id='text'>
                    <a id='title'>Floral Arrangement Available</a>
                </div>
            </div>

            <div id='content'>
                <div id='list'>

                    <?php
                    if (!empty($arrangement)) {
                        foreach ($arrangement as $item) {
                            echo '<div class="item">' .
                            '<img id="img" name="img" src = "' . $item->imageURL . '">' .
                            '<a href="floral%28Cust%29.php?id=' . $item->id . '" class="name">' . $item->name . '</a></div>';
                        }
                    } else {
                        echo '<div class="item">' .
                        '<label class="name"> No floral arrangement in store yet<br/>Stay tune!</label>' .
                        '</div>';
                    }
                    ?>
                </div>

            </div>  
        </div>
    </body>


</html>
