<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
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

                <form method="POST" action="" id="addFlower">

                    <div id="form">
                        <label>Name:</label>
                        <input type="text" id="name" value="" size="20" /><br />
                        <label>Image:</label><br />
                        <div id="left"> 
                            <img id="flowerImg" src="http://placehold.it/180" alt="your image" />
                            
                        </div>
                        <div id="right"> 
                            <input type="file" id="img" name="image" accept="image/*"><br />
                        </div>
                        <div id="bottom">
                            <label>Description:</label>
                            <span class="desc" role="textbox" contenteditable></span><br />
                            <label>Price:</label>
                            <input type="number" id="price" value="" size="20" /><br />
                        </div>
                    </div>
                    <input type="checkbox" id="isAvailable" value="ON" /> Available to sell<br />

                    <input type="submit" value="Save" name="save" />
                </form>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#flowerImg').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</html>     

