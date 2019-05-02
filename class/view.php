<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
?>

<?php

  if(isset($_POST['update'])){
      $id = $_POST['id'];
      $updated= $_POST['new_quantity'];
      $query = "UPDATE `items` SET `ItemQuantity`='$updated' WHERE `ItemID` = '$id'";
      $res = mysqli_query($con,$query);
      echo '<script>alert("Quantity Updated")</script>';
  }

  if(isset($_POST['goback'])){
    header("location: accept.php");
  }

?>

<html>
<head>
  <title>Detailed Orders</title>
</head>
<body>

  <div class="container" style="width:700px;">
    <h1 class="w3-container text-uppercase" align="center">Core 2 Shop</h1>
		</br>
		<h2 class="w3-container text-light">View Detailed Orders</h2>

    <form action="view.php" method="post">
      <input type = "text" name="search_order" class="form-control">
      <button type = "submit" name="search" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-hover table-dark w3-animate-bottom">
		<thead class="thead-light">
		  <tr>
        <th>Item ID</th>
				<th>Item Names</th>
				<th>Quantity</th>
				<th>Item Price</th>
			</tr>
		</thead>

  <?php
      if(isset($_POST["search"])){
      ?>
        <tbody>
        <?php
      $query = "SELECT * FROM orderlist WHERE orderID = '$_POST[search_order]'";
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
            <td><?php echo $row['itemID'];?></td>
						 <td><?php echo $row['itemName'];?></td>
						 <td><?php echo $row['itemQuantity'];?></td>
						 <td><?php echo $row['itemPrice'];?></td>
             </tbody>
            <?php
          }
        }
          }
  ?>


</table>
<form action = "view.php" method="POST">
<input type="submit" name="goback" value="Click Here to Go Back">
</div>
</form>
</body>
</html>
