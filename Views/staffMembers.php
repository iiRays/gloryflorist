<html>
    <head>
        <meta charset="UTF-8">
        <title>Glory Florist : Staff Members</title>
        <link rel="stylesheet" href="staffMembers.css">
    </head>
    
<body>

<form id='container' method='POST' action="#">

  <div id='hotbar'>
    <a href='#' id='glory'>glory florist</a>
    <a href='#' class='link'>shop</a>
    <a href='#' class='link'>cart</a>
    <a href='#' class='link'>account</a>
    <a href='#' class='link' id='currentLink'>dashboard</a>
  </div>

  <div id='top'>
    <div id='content'>
      <a href='#' id='back'>back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dashboard</a>
      <a id='title'>Staff Members</a>
    </div>
  </div>

  <div id='bottom'>
    <div id='content'>
    
      <div id='buttons'>
        <a href='#' class='button'>Add staff member</a>
        <input type='checkbox' name='seeChanges' id='seeChanges' onclick='see()'>
        <label id='seeChangesText' for='seeChanges'>See changes</label>
        <a href='#' class='button'>Save changes</a>
      </div>
      
      <div id='changes'>
        <a id='text'>
          (Sample changelog)<br>
          - Changed <span>[01] John Doe</span> to <span>Active</span>.
        </a>
      </div>
      
      <div id='list'>
      
        <div id='heading'>
          <a id='id'>ID</a>
          <a id='name'>NAME</a>
          <a id='isActive'>IS ACTIVE?</a>
        </div>
      
        <div class='member'>
          <a class='id'>01</a>
          <a class='name'>John Doe</a>
          <input checked type='checkbox' class='checkbox' id='isActive_01' name='isActive_01'> <!-- example if checked -->
          <label class='checkboxLabel' for='isActive_01'>
            <div class='slider'></div>
          </label>
        </div>
        
        <div class='member'>
          <a class='id'>02</a>
          <a class='name'>Johnny Doe</a>
          <input type='checkbox' class='checkbox' id='isActive_02' name='isActive_02'>
          <label class='checkboxLabel' for='isActive_02'>
            <div class='slider'></div>
          </label>
        </div>
        
        <div class='member'>
          <a class='id'>03</a>
          <a class='name'>Johanthan Doe</a>
          <input type='checkbox' class='checkbox' id='isActive_03' name='isActive_03'>
          <label class='checkboxLabel' for='isActive_03'>
            <div class='slider'></div>
          </label>
        </div>
        
        <div class='member'>
          <a class='id'>04</a>
          <a class='name'>Johansson Doe</a>
          <input type='checkbox' class='checkbox' id='isActive_04' name='isActive_04'>
          <label class='checkboxLabel' for='isActive_04'>
            <div class='slider'></div>
          </label>
        </div>

      </div>
      
    </div>
  </div>

</form>

<script>
function see() {
	var checkbox = document.getElementById("seeChanges");
  var text = document.getElementById("changes");
  
  if (checkbox.checked == true){
    text.style.opacity = "1";
    text.style.maxHeight = "500px";
  } else {
    text.style.opacity = "0";
    text.style.maxHeight = "0px";
  }
}
</script>

</body>

</html>