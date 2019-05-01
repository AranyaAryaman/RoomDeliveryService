<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');


if(isset($_POST['goback'])){
  header("location: hotel_welcome.php");
}

?>

<html>
<head>
  <title>Detailed Orders</title>
  <link rel="stylesheet" href="sales.css" media="all" />
</head>
<body>

  <div class="container" style="width:700px;">
    <h1 class="w3-container text-uppercase" align="center">Core 2 Shop</h1>
		</br>
		<h2 class="w3-container text-light" align ="center">View Detailed Orders</h2>
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
        $query = "SELECT * FROM orders WHERE `Timestamp` >= 'date()' ";
        $result = mysqli_query($con,$query);
      }
        if(!$result){
          exit(mysqli_error($con));
        }

      $num = mysqli_num_rows($result);

      if($num >0){
          while($rown = mysqli_fetch_assoc($result))
          {
            ?>
            <tr>
            <td><?php echo $rown['Timestamp'];?></td>
						 <td><?php echo $rown['userName'];?></td>
						 <td><?php echo $rown['orderID'];?></td>
						 <td><?php echo $rown['Amount'];?></td>
             <td>
             <form action="sales.php" method="post">
               <input type="hidden" name="id" value="<?php echo $rown['orderID'];?>">
               <button type = "submit" name="view_detailed" class="btn btn-primary">View Detailed</button>
             </form>
            </td>
             </tbody>
            <?php
          }
        }
      }
  ?>

</table>

<br><br><br><br>

<div class="container" style="width:700px;">

  </br>
  <h2 class="w3-container text-light" align = "center"> Detailed Orders</h2>


  <table class="table table-hover table-dark w3-animate-bottom">
  <thead class="thead-light">
    <tr>
      <th>Date & Time</th>
      <th>Customer Name</th>
      <th>Order ID</th>
      <th>Amount</th>
      <th>Item ID</th>
      <th>Item Names</th>
      <th>Quantity</th>
      <th>Item Price</th>

    </tr>
  </thead>

<?php
    if(isset($_POST["view_detailed"])){
    ?>
      <tbody>
      <?php
      $id = $_POST['id'];
      $query = "SELECT * FROM orderlist WHERE `orderID` = '$id' ";
      $result = mysqli_query($con,$query);

      $query2 = "SELECT * FROM orders WHERE `orderID` = '$id' ";
      $result2 = mysqli_query($con,$query2);
      $rown = mysqli_fetch_assoc($result2);

    if(!$result){
      exit(mysqli_error($con));
    }

    $num = mysqli_num_rows($result);

    if($num >0){
        while($row = mysqli_fetch_assoc($result))
        {
          ?>
          <tr>
            <td><?php echo $rown['Timestamp'];?></td>
             <td><?php echo $rown['userName'];?></td>
             <td><?php echo $rown['orderID'];?></td>
             <td><?php echo $rown['Amount'];?></td>
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
