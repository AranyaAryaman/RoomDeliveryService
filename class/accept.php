<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
?>

<?php

  if(isset($_POST["accept"]) && isset($_SESSION['accept'])){
      $id = $_POST['id'];
      $query = "UPDATE `orders` SET `Status`='1' WHERE `orderID` = '$id' ";
      $res = mysqli_query($con,$query);
      echo '<script>alert("Order Accepted")</script>';
  }

  if(isset($_POST['goback'])){
    header("location: hotel_welcome.php");
  }

?>

<html>
<head>
  <title align = "center" >Accept Orders</title>
  <link rel="stylesheet" href="accept.css" media="all" />
</head>
<body>


  <div class="container" style="width:700px;">
    <h1 class="w3-container text-uppercase" align="center">Core 2 Shop</h1>
		</br>
		<h2 class="w3-container text-light"align ="center">Accept Orders</h2>
    <form action="view.php" method="post" >
      <div class="form_input" align="center" >
      <input type="hidden" name="nextid" value="<?php echo $row['orderID'];?>">
      <button type = "submit" name="view" class="btn btn-primary">View Detailed Orders</button>
    </div>
    </form>
		<table class="table table-hover table-dark w3-animate-bottom">
		<thead class="thead-light">
		  <tr>
        <th>Order ID</th>
				<th>User Name</th>
				<th>Delivery Address</th>
				<th>Time of Order</th>
        <th>Amount</th>
        <th>Status</th>
			</tr>
		</thead>
		<tbody>

  <?php
      $query = "SELECT * FROM orders WHERE Status = 0 ";
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
            <td><?php echo $row['orderID'];?></td>
						 <td><?php echo $row['userName'];?></td>
						 <td><?php echo $row['Address'];?></td>
             <td> <?php echo $row['Timestamp'];?></td>
             <td> <?php echo $row['Amount'];?></td>
						 <td>
            <form action="accept.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row['orderID'];?>">
              <button type = "submit" name="accept" class="btn btn-primary">Accept Order</button>
            </form>
             </td>
             <?php
          }
        }
        ?>
        </tbody>
      </table>

      <form action = "view.php" method="POST">
      <input type="submit" name="goback" value="Click Here to Go Back">
      </div>
      </form>

</html>
</body>
</html>
