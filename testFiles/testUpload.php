<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>

<form id="imgur" method="POST" action="testUpload2.php">
    <input type="file" class="imgur" accept="image/*" data-max-size="5000" />
    <img id="flowerImg" src="http://placehold.it/180" alt="your image" />
    <input type="hidden" id="flowerImgSrc" name="flowerImgSrc" value=""/>
    <input type="submit" value="Submit" />
</form>
<p id='test'></p>

<script>
    /*
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
     * 
     */

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

