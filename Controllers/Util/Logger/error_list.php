<?php
/*
  Author: kelvin tham yit hang
  */
require_once 'DatabaseLogger'; //get errors from database
require_once 'error_constant_to_name.php'; //convert the error_type (int) to string and send as subject
?>
<!DOCTYPE html>
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
