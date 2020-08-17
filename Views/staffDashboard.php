<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Staff Dashboard</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/staffDashboard.css">
    </head>
    <body>
        <div id='container'> <!-- <form id='container'> ??? -->

            <div id='hotbar'>
                <a href='#' id='glory'>glory florist</a>
                <a href='#' class='link'>shop</a>
                <a href='#' class='link'>cart</a>
                <a href='#' class='link' >account</a>
                <a href='#' class='link' id='currentLink'>dashboard</a>
            </div>

            <div id='top'>
                <div id='text'>
                    <a href='#' id='back'>back &nbsp; to &nbsp; the shop</a>
                    <a id='title'>Staff Dashboard</a>
                </div>
            </div>
            <div id="content">
                <div id="left">
                    <div class="item" id="order">
                        View orders
                        <div id="counter">7</div>
                    </div>
                    <br/><br/><br/>
                    <div class="item" id="staff">
                        Manage staff
                    </div>
                </div>
                <div id="right">
                    <div class="item" id="arrangement">
                        Manage arrangements
                    </div>
                    <br/><br/><br/>
                    <div class="item" id="flower">
                        Manage flowers
                    </div>
                </div>
                <br>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#order").click(function () {
            window.location.href = "staffOrders.php";
        });
        $("#staff").click(function () {
            window.location.href = "viewStaff.php";
        });
        $("#arrangement").click(function () {
            window.location.href = "staffOrders.php";
        });
        $("#flower").click(function () {
            window.location.href = "staffOrders.php";
        });
    </script>
</html>

