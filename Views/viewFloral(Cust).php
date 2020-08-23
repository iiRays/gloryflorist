<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->
<!DOCTYPE html>
<?php
require_once("../Controllers/Util/rb.php");
require_once("../Controllers/Util/DB.php");
require_once("../Controllers/Util/Quick.php");

DB::connect();

$arrangement = R::findAll('arrangement');
?>
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewFloral(Cust).css">
        <title>Glory Florist : Flower Arrangement Available</title>
    </head>
    <body>
        <div id='container'> 

            <?php Quick::printHeader("shop") ?>

            <div id='top'>
                <div id='text'>
                    <a id='title'>Flower Arrangement Available</a>
                </div>
            </div>

            <div id='content'>
                <div id='list'>

                    <?php
                    if (!empty($arrangement)) {
                        foreach ($arrangement as $item) {
                            echo '<a href="floral%28Cust%29.php?id=' . $item->id . '" ><div class="item">' .
                            '<img id="img" name="img" src = "' . $item->imageURL . '">' .
                            '<label class="name">' . $item->name . '</label></div></a>';
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
