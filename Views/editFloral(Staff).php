<?php
  require_once("../Controllers/Security/Authorize.php");
  Authorize::onlyAllow("staff");
?>
<!DOCTYPE html>
<?php
//include "../Controllers/Util/rb.php";
//include "../Controllers/Util/DB.php";
include '../Controllers/Util/FloralArrangementAdapter.php';

//DB::connect();

$id = $_GET['id'];
//$id = 3;

$floral= new FloralArrangementAdapter();

$imgSrc = $floral->getImgSrc($id);
$name = $floral->getName($id);
$price = $floral->getPrice($id);
$flowerName = $floral->getFlowerName($id);
$flowerId = $floral->getFlowerId($id);
$stalk = $floral->getStalks($id);
$isAvailable = $floral->getAvailability($id);

//$sql = "select * from arrangement where id = " . $id;
//
//$arrangement = R::getRow($sql);
//
//$results = array();
//
//foreach ($arrangement as $item) {
//    $results[] = $item;
//}
//$name = $results[1];
//$price = $results[2];
//$isAvailable = $results[3];
//$imgSrc = $results[4];
//$stalk = $results[5];
//$flower = $results[6];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/editFloral(Staff).css">
        <title>Glory Florist : Edit Floral</title>
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
                    <a id='title'>Edit Floral Arrangement</a>
                </div>
            </div>

            <div id='content'>

                <form method="POST" action="edit_floral.php" id="addFloral">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
                    <div id="form">
                        <label>Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>" size="20" /><br />
                        <label>Image:</label><br />
                        <div id="left"> 
                            <img id="flowerImg" src="<?php echo $imgSrc; ?>" alt="flower" /><br />
                            <input type="hidden" id="flowerImgSrc" name="flowerImgSrc" value="<?php echo $imgSrc; ?>"/>
                        </div>
                        <div id="right"> 
                            <input type="file" id="img" name="image" accept="image/*">
                        </div>
                        <div id="bottomLeft">
                            <label>Flowers</label><br/>
                            <select name="flowers" id="flowers" >
                                <?php
                                $sql = "select flower_name from flower";

                                $flowers = R::getAll($sql);

                                $results = array();

                                foreach ($flowers as $items) {
                                    foreach ($items as $item) {
                                        $results[] = $item;
                                    }
                                }

                                foreach ($results as $key => $value) {
                                    $key += 1;
                                    if ($key == $flowerId) {
                                        echo '<option value="' . $key . '" selected="selected">' . $value . '</option>';
                                    } else {
                                        echo '<option value="' . $key . '">' . $value . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div id="bottomRight">
                            <label>Stalks</label><br/>
                            <input type="number" id="stalk" name="stalk" value="<?php echo $stalk; ?>" size="20" /><br />
                        </div>
                        <div id="bottom">
                            <label>Price: RM</label>
                            <input type="number" step=0.01 id="price" name="price" value="<?php echo number_format($price, 2); ?>" size="20" /><br />
                        </div>
                    </div>

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
                            document.getElementById("flowerImg").value = res.data.link;
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

