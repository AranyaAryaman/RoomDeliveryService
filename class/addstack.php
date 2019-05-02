<?php
  session_start();
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,'users');

  if(isset($_POST['itemadd'])){

    $name=$_POST['itemname'];
    $quantity=$_POST['itemquantity'];
    $price=$_POST['itemprice'];
    $prep_time=$_POST['itempreptime'];
    $query = "INSERT INTO `items`(`ItemName`, `ItemQuantity`, `ItemPrice`, `PrepTime`) VALUES ('$name','$quantity','$price','$prep_time')";
    mysqli_query($con,$query);
    echo "Item Successfully Added";
    header("Location:hotel_welcome.php");
    // }
    // else{
    //   echo "Error Adding Item, Add Some Item First" ;
    // }
  }

?>

<html>
<head>
  <title>Add Stock </title>
  <link rel="stylesheet" href="addstack.css" media="all" />
</head>
<body>
 <form action="addstack.php" method="POST" >
  <div class="form_input">
  <p>Item Name</p>
  <input type="text" name="itemname" placeholder="Name of Item">
  </div>

  <div class="form_input">
  <p>Initial Quantity Available</p>
  <input type="text" name="itemquantity" placeholder="Available Quantity">
  </div>

  <div class="form_input">
  <p>Item Price</p>
  <input type="text" name="itemprice" placeholder="Enter Price">
  </div>

  <div class="form_input">
  <p>Preparation Time</p>
  <input type="text" name="itempreptime" placeholder="Preparation Time of Item">
  </div>
  <br></br>
  <input type="submit" name="itemadd" value="Add Item">
</form>

</body>
</html>
