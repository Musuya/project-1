<?php
  include 'header.php';
?>
    
<?php
    if (isset($_SESSION['id'])){
        echo $_SESSION['id'];
    } else {
         echo "<h1 class='status'> You are not logged in!</h1>";
    }
?>

<br><br><br>
 <?php
    if (isset($_SESSION['id'])){
        echo "<h2 class='status'>You are already logged in!</h2>";
    } else {
        echo "<form action='includes/signup.inc.php' class='form-reg' method='post'>
    <input type='text' name='first' class='form-input' placeholder='firstname' required><br><br>
    <input type='text' name='last' class='form-input' placeholder='lastname' required><br><br>
    <input type='text' name='uid' class='form-input' placeholder='username' required><br><br>
    <input type='password' name='pwd' class='form-input' placeholder='password' required><br><br>
    <button type='submit' class='button'>SIGN UP</button>
</form>";
    }
 ?>

</body>
</html>