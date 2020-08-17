<html>

  <head>
    <meta charset="UTF-8">
    <title>Glory Florist : Staff Register</title>
    <link rel="stylesheet" href="CSS/common.css">
    <link rel="stylesheet" href="CSS/registerStaff.css">
  </head>

  <body>
    <div id='container'>
      <!-- <form id='container'> ??? -->

      <div id='hotbar'>
        <a href='#' id='glory'>glory florist</a>
        <a href='#' class='link'>shop</a>
        <a href='#' class='link'>cart</a>
        <a href='#' class='link'>account</a>
        <a href='#' class='link' id='currentLink'>dashboard</a>
      </div>

      <div id='top'>
        <div id='text'>
          <a href='#' id='back'>back &nbsp; to the shop</a>
          <a id='title'>Register a Staff</a>
        </div>
      </div>
      <div id="content">
          <form action="../Controllers/registerStaff.php" method="POST">

          <div class="field">
            <h4 class="label">NAME</h4>
            <input type="text" name="name">
          </div>
          <div class="field">
            <h4 class="label">EMAIL</h4>
            <input type="text" name="email">
          </div>
          <input type="submit" value="REGISTER"/>
        </form>
      </div>
    </div>
  </body>

</html>
