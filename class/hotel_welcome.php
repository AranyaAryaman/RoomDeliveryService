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

  elseif(isset($_POST['seelist'])){
    header("location: list_products.php");
  }

?>


<html>
<head>
  <title> WELCOME PAGE </title>
   <link rel="stylesheet" href="hotel_welcome.css" media="all" />
</head>
<body>
	<br></br><br></br><br></br><br></br><br></br><br></br><br></br>

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

  <form action = "hotel_welcome.php" method="POST">
    <div class="form_input" align="center">
    <input type="submit" name="seelist" value="More Stock Required">
    </div>
  </form>

  <form action = "signout.php" method="POST">
    <div class="form_input" align="center">
    <input type="submit" name="signout" value="Log Out">
    </div>
  </form>

</body>
</html>
