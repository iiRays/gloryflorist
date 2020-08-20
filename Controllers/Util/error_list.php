<?php
include('init.inc.php');
require_once 'error_constant_to_name.php'; //convert the error_type (int) to string and send as subject
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach (fetch_errors() as $error) {
            ?>
            <p>
                <span class="type"><?php echo error_constant_to_name($error['error_type']); ?></span>
                <span class="type"><?php echo $error['error_string']; ?></span>
                <span class="type"><?php echo $error['error_file']; ?></span>
                <span class="type"><?php echo $error['error_line']; ?></span>
            </p>

            <?php
        }
        ?>
    </body>
</html>
