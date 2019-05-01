<?php
  if(isset($_POST["logstud"])){
    header('location: login.php');
  }

  if(isset($_POST["loghot"])){
    header('location: hotel_login.php');
  }

?>


<!DOCTYPE html>
<html>
<head>
<title> First Page </title>
<body>
      <form action="index.php" method="POST" >
        <div class="form_input">
        <input type="submit" name="logstud" value="Students">
        </div>
      </form>

      <form action="index.php" method="POST" >
      <div class="form_input">
      <input type="submit" name="loghot" value="Shop">
      </div>
    </form>

</body>
</html>
