<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>

<form id="imgur">
    <input type="file" class="imgur" accept="image/*" data-max-size="5000" />
</form>
<p id='test'></p>

<script>
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
                        console.log("Uploading | 上传中");
                    },
                    success: function (res) {
                        console.log(res.data.link);
                        $('body').append('<img src="' + res.data.link + '" />');
                        document.getElementById("test").innerHTML = res.data.link;
                    },
                    error: function () {
                        alert("Failed | 上传失败");
                    }
                }
                $.ajax(settings).done(function (response) {
                    console.log("Done | 成功");
                });
            }
        });
    });
</script>