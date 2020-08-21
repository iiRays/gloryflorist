<?php
  require_once("../Controllers/Security/Authorize.php");
  Authorize::onlyAllow("staff");

?>
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
        <link rel="stylesheet" href="CSS/viewFloral(Staff).css">
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
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
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
                            '<a href="floral%28Staff%29.php?id=' . $item->id . '" class="name">' . $item->name . '</a>' .
                            '<a href="editFloral%28Staff%29.php?id=' . $item->id . '" id="edit_button">Edit</a>' .
                            '</div>';
                        }
                    }else {
                        echo '<div class="item">' .
                        '<label class="name"> No floral arrangement in store yet<br/>Add some now!!</label>' .
                        '</div>';
                    }
                    ?>
                </div>

            </div>  

            <div id='bottom'>
                <a href='addFloral(Staff).php' id='add_button'>Add more floral arrangement</a>
            </div>
        </div>
    </body>


</html>