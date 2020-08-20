<!--
Author: Chong Wei Jie
ID: 19WMR09574
-->
<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("staff");
?>
<!DOCTYPE html>
<?php
//include "../Controllers/Util/rb.php";
//include "../Controllers/Util/DB.php";
include '../Controllers/Util/Flower/FlowerAdapter.php';

//DB::connect();

$id = $_GET['id'];
//$id = 1;
$flower = new FlowerAdapter();

$imgSrc = $flower->getImgSrc($id);
$name = $flower->getName($id);
$remark = $flower->getRemarks($id);
$isAvailable = $flower->getAvailability($id);
/*
$sql = "select * from flower where id = " . $id;

$flower = R::getRow($sql);

$results = array();

foreach ($flower as $item) {
    $results[] = $item;
}

$name = $results[1];
$remark = $results[2];
$imgSrc = $results[3];
$isAvailable = $results[4];
 * 
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/editFlower(Staff).css">
        <title>Glory Florist : Edit Flower</title>
    </head>

    <body>
        <div id='container'>

            <div id='hotbar'>
                <a href='#' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='#' class='link'>cart</a>
                <a href='#' class='link'>account</a>
                <a href='#' class='link' id='currentLink'>dashboard</a>
            </div>

            <div id='top'>
                <div id='text'>
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>Edit Flower</a>
                </div>
            </div>

            <div id='content'>

                <form method="POST" action="edit_flower.php" id="editflower">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
                    <div id="form">
                        <label>Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>" size="20" required/><br />
                        <label>Image:</label><br />
                        <div id="left"> 
                            <img id="flowerImg" name="flowerImg" src="<?php echo $imgSrc; ?>" alt="flower" /><br />
                            <input type="hidden" id="flowerImgSrc" name="flowerImgSrc" value="<?php echo $imgSrc; ?>" />
                        </div>
                        <div id="right"> 
                            <input type="file" id="img" name="image" accept="image/*" required><br />
                        </div>
                        <div id="bottom">
                            <label>Remarks:</label>
                            <textarea rows="4" cols="50" id="remark" name="remark" form="editflower"><?php echo $remark; ?></textarea>
                        </div>
                    </div>
                    
                    <input type="checkbox" id="isAvailable" name="isAvailable" value="ON" <?php if ($isAvailable == "true"){$value = 'checked'; echo $value;}?> onchange="chgStatus()"/> 
                    Available for floral arrangement<br />

                    <input type="submit" value="Save" name="save" />
                </form>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        $("document").ready(function () {

            $('input[type=file]').on("change", function () {


                var $files = $(this).get(0).files;

                if ($files.length) {

                    // Reject big files
                    if ($files[0].size > $(this).data("max-size") * 1024) {
                        console.log("Please select a smaller file");
                        return false;
                    }

                    // Replace ctrlq with your own API key
                    var apiUrl = 'https://api.imgur.com/3/image';
                    var apiKey = '0e66933dd04ce48';

                    var formData = new FormData();
                    formData.append("image", $files[0]);

                    var settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": apiUrl,
                        "method": "POST",
                        "datatype": "json",
                        "headers": {
                            "Authorization": "Client-ID " + apiKey
                        },
                        "processData": false,
                        "contentType": false,
                        "data": formData,
                        beforeSend: function (xhr) {
                            console.log("Uploading");
                        },
                        success: function (res) {
                            console.log(res.data.link);
                            document.getElementById("flowerImg").src = res.data.link;
                            document.getElementById("flowerImgSrc").value = res.data.link;
                        },
                        error: function () {
                            alert("Failed");
                        }
                    }
                    $.ajax(settings).done(function (response) {
                        console.log("Done");
                    });
                }
            });
        });
    </script>

</html>     

