<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : View Orders</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="common.css">
        <link rel="stylesheet" href="staffOrders.css">
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
                    <a href='staffDashboard.php' id='back'>back to dashboard</a>
                    <a id='title'>View Orders</a>
                </div>
            </div>
            <div id="content">

                <div class="masonryContainer">
                    <div class='item' id="order1">
                        <div class="orderID">O2938</div> 
                        <div class="arrangement" data-quantity="3">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                    <div class='item'>
                        <div class="orderID">O2938</div> 
                        <div class="arrangement">Extreme bouquet x 3</div> 
                        <div class="flowers">12 stalks</div>
                        <div class="flowers">Rose</div>
                        <div class="arrangement">Supreme Flowers x 3</div> 
                        <div class="deadline">3 hours left</div>
                    </div>
                </div>

            </div>
        </div>
        <div class="overlay">
        </div>
        <div class="itemFocus">
            <div class="orderID">O2938</div> 
            <div class="arrangement">Extreme bouquet <div class="arrangementQuantity"></div></div> 
            <div class="flowers">12 stalks</div>
            <div class="flowers">Rose</div>
            <div class="arrangement">Supreme Flowers x 3</div> 
            <div class="deadline">3 hours left</div>
        </div>
        
    </body>
    <script>
        $(".item").click(function () {
            $(".itemFocus").addClass("itemFocusVisible");
            $(".overlay").addClass("overlayVisible");
            
            //get order ID
            var id = this.id;
            var quantity = $("#" + id +" > .arrangement").data("quantity");
           
           // Set values into itemFocus
           $(".itemFocus > .arrangement > .arrangementQuantity").html(quantity);
        });
        $(".overlay").click(function () {
            $(".itemFocus").removeClass("itemFocusVisible");
            $(".overlay").removeClass("overlayVisible");
        });
        $(document).ready(function () {
            
        });
    </script>
</html>

