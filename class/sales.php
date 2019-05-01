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
    <br><br><br>
    <h3>
    <form action="sales.php" method="post">
      <label for="start">From:</label>
      <input type = "date" name="from" class="form-control">
      <label for="start">To:</label>
      <input type = "date" name="to" class="form-control" min="2018-01-01" max="2019-12-31">
      <button type = "submit" name="search" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-hover table-dark w3-animate-bottom">
		<thead class="thead-light">
		  <tr>
        <th>Date & Time</th>
				<th>Customer Name</th>
				<th>Order ID</th>
				<th>Amount</th>
        <th> View Detailed Orders </th>
			</tr>
		</thead>

  <?php
      if(isset($_POST["search"])){
      ?>
        <tbody>
        <?php
        if($_POST['from'] != "" OR $_POST['to'] != ""){
      $query = "SELECT * FROM orders WHERE `Timestamp` >= '$_POST[from]' AND `Timestamp` <= '$_POST[to]'";
      $result = mysqli_query($con,$query);
      }
      else{
        $query = "SELECT * FROM orders WHERE `Timestamp` >= date() AND `Timestamp` <= '$_POST[to]'";
        $result = mysqli_query($con,$query);
      }
        if(!$result){
          exit(mysqli_error($con));
        }

      $num = mysqli_num_rows($result);

      if($num >0){
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
            <tr>
            <td><?php echo $row['Timestamp'];?></td>
						 <td><?php echo $row['userName'];?></td>
						 <td><?php echo $row['orderID'];?></td>
						 <td><?php echo $row['Amount'];?></td>
             <td>
             <form action="sales.php" method="post">
               <input type="hidden" name="id" value="<?php echo $row['orderID'];?>">
               <button type = "submit" name="accept" class="btn btn-primary">Accept Order</button>
             </form>
            </td>
             </tbody>
            <?php
          }
        }
      }
  ?>

</table>
</body>
</html>
