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
                            <input type="file" id="img" name="image" accept="image/*" onchange="readURL(this);">
                        </div>
                        <div id="right"> 
                            <img id="flowerImg" src="http://placehold.it/180" alt="your image" /><br />
                        </div>
                        <div id="bottom">
                            <label>Description:</label>
                            <textarea rows="4" cols="50" id="desc" name="desc" form="addFlower"></textarea>
                            <label>Price:</label>
                            <input type="number" step=0.01 id="price" name="price" value="" size="20" /><br />
                        </div>
                    </div>
                    <input type="checkbox" id="isAvailable" value="ON" /> Available to sell<br />

                    <input type="submit" value="Add" name="add" />
                </form>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        function readURL(input) {
            try {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#flowerImg').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            } catch (error) {
                alert(error);
            }
        }

        function postToImgur() {
            var formData = new FormData();
            formData.append("image", $("[name='uploads[]']")[0].files[0]);
            $.ajax({
                url: "https://api.imgur.com/3/image",
                type: "POST",
                datatype: "json",
                headers: {
                    "Authorization": "0e66933dd04ce48"
                },
                data: formData,
                success: function (response) {
                    //console.log(response);
                    var photo = response.data.link;
                    var photo_hash = response.data.deletehash;
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    </script>


</html>     

