<?php
  include 'header.php';
?>
    
<?php
    if (isset($_SESSION['id'])){
        include('./includes/home.inc.php');
    } else {

        echo "<h1 class='status'> You are not logged in!</h1>";
    }
?>
    
</body>
</html>