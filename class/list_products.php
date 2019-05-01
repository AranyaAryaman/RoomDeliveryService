<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');

if(isset($_POST['goback'])){
  header("location: hotel_welcome.php");
}

?>

<!-- <?php

  if(isset($_POST['update'])){
      $id = $_POST['id'];
      $updated= $_POST['new_quantity'];
      $query = "UPDATE `items` SET `ItemQuantity`='$updated' WHERE `ItemID` = '$id'";
      $res = mysqli_query($con,$query);
      echo '<script>alert("Quantity Updated")</script>';
  }

?> -->

<html>
<head>
  <title>Detailed Orders</title>
</head>
<body>

  <div class="container" style="width:700px;">
    <h1 class="w3-container text-uppercase" align="center">Core 2 Shop</h1>
		</br>
		<h2 class="w3-container text-light">Required Stock of Items</h2>

    <table class="table table-hover table-dark w3-animate-bottom">
		<thead class="thead-light">
		  <tr>
        <th>Item ID</th>
				<th>Item Names</th>
				<th>Quantity</th>
				<th>Item Price</th>
			</tr>
		</thead>
        <tbody>
        <?php
      $query = "SELECT * FROM items WHERE ItemQuantity < 10 AND ItemQuantity != 'Unlimited' ";
      $result = mysqli_query($con,$query);

      if(!$result){
        exit(mysqli_error($con));
      }

      $num = mysqli_num_rows($result);

      if($num >0){
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
            <tr>
            <td><?php echo $row['ItemID'];?></td>
						 <td><?php echo $row['ItemName'];?></td>
						 <td><?php echo $row['ItemQuantity'];?></td>
						 <td><?php echo $row['ItemPrice'];?></td>
             </tbody>
            <?php
          }
        }
  ?>
  <form action = "view.php" method="POST">
  <input type="submit" name="goback" value="Click Here to Go Back">
  </div>
  </form>


</table>
</body>
</html>
