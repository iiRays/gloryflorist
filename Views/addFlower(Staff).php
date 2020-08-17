<?php
require_once("../Controllers/Security/Authorize.php");
Authorize::onlyAllow("staff");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/addFlower(Staff).css">
        <title>Glory Florist : Add Flower</title>
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
                    <a id='title'>Add Flower</a>
                </div>
            </div>

            <div id='content'>

                <form method="POST" action="add_flower.php" id="addFlower">

                    <div id="form">
                        <label>Name:</label>
                        <input type="text" id="name" name="name" value="" size="20" /><br />
                        <label>Image:</label><br />
                        <div id="left"> 
                            <input type="file" id="img" name="image" accept="image/*">
                        </div>
                        <div id="right"> 
                            <img id="flowerImg" src="http://placehold.it/180" alt="your image" /><br />
                            <input type="hidden" id="flowerImgSrc" name="flowerImgSrc" value=""/>
                        </div>
                        <div id="bottom">
                            <label>Description:</label>
                            <textarea rows="4" cols="50" id="desc" name="desc" form="addFlower"></textarea>
                            <label>Price:</label>
                            <input type="number" step=0.01 id="price" name="price" value="" size="20" /><br />
                        </div>
                    </div>
                    <input type="checkbox" id="isAvailable" name="isAvailable" value="ON" /> Available to sell<br />

                    <input type="submit" value="Add" name="add" />
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
                            document.getElementById("test").innerHTML = document.getElementById("flowerImgSrc").value;
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

