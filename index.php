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
<link rel="stylesheet" href="styleindex.css" media="all" />
</head>
<body>
	<br></br><br></br><br></br><br></br><br></br><br></br><br></br>
      <form action="index.php" method="POST" >
        <div class="form_input" align ="center">
        <input type="submit" name="logstud" value="Students">
        
      </form>
      <br></br>
      <form action="index.php" method="POST" >
      
      <input type="submit" name="loghot" value="Shop">
      </div>
    </form>

</body>
</html>
