<form method="POST" action="testValid.php">
    Name<br/>
    <input type="text" name="name" id="name" value="" /><br/>
    Email<br/>
    <input type="text" name="email" id="email" value="" /><br/>
    Number<br/>
    <input type="text" name="number" value="" /><br/>
    Two decimal<br/>
    <input type="text" name="2decimal" value="" /><br/>
    Password<br/>
    <input type="text" name="password" value="" /><br/>
    Confirm Password<br/>
    <input type="text" name="cPassword" value="" /><br/>
    Contact No. (10 - 11 digits)<br/>
    <input type="text" name="phone" value="" /><br/>
    <br/>
    <input type="submit" name="submit" value="submit" /><br/>
</form>
    <?php
    /* if(isset($_POST['submit'])){
      $a = Validation::validateLetterOnly($_POST['name']); //work
      //Validation::showError($a);

      $b = Validation::validateEmail($_POST['email']); //work
      //Validation::showError($b);

      $c = Validation::validateNumOnly($_POST['number']); //work
      //Validation::showError($c);

      $d = Validation::validateTwoDecimal($_POST['2decimal']); //work
      //Validation::showError($d);

      $e = Validation::validatePassword($_POST['password'],$_POST['cPassword']); //work
      //Validation::showError($e);

      $f = Validation::validatePhone($_POST['phone']); //work
      Validation::showError($a + $b + $c + $d + $e + $f);
      }
      /*echo $_POST['name'] . ' = ' . $a . '<br/>' .
      $_POST['email'] . ' = ' . $b . '<br/>' .
      $_POST['number'] . ' = ' . $c . '<br/>' .
      $_POST['2decimal'] . ' = ' . $d . '<br/>' .
      $_POST['password'] . ' | ' . $_POST['cPassword'] . ' = ' . $e . '<br/>' .
      $_POST['phone'] . ' = ' . $f . '<br/>' ;
     * 
     */
    ?>
