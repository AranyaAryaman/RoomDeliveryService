<?php
  session_start();

  if(isset($_POST['stock'])){
    header("location: stock.php");
  }

  elseif(isset($_POST['accept'])){
    header("location: accept.php");
  }

  elseif(isset($_POST['sales'])){
    header("location: sales.php");
  }

  elseif(isset($_POST['addstack'])){
    header("location: addstack.php");
  }
?>


<html>
<head>
  <title> WELCOME PAGE </title>
</head>
<body>

  <form action = "hotel_welcome.php" method="POST">
    <div class="form_input" align="center">
    <input type="submit" name="stock" value="Update Your Stock">
    </div>
  </form>

  <form action = "hotel_welcome.php" method="POST">
    <div class="form_input" align="center">
    <input type="submit" name="sales" value="View Your Sales">
    </div>
  </form>

  <form action = "hotel_welcome.php" method="POST">
    <div class="form_input" align="center">
    <input type="submit" name="accept" value="Accept Orders">
    </div>
  </form>

  <form action = "hotel_welcome.php" method="POST">
    <div class="form_input" align="center">
    <input type="submit" name="addstack" value="Add Items">
    </div>
  </form>

</body>
</html>
