<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
?>

<?php


?>

<html>
<head>
  <title>Update Stack </title>
</head>
<body>

  <div class="container" style="width:700px;">
    <h1 class="w3-container text-uppercase" align="center">Core 2 Shop</h1>
		</br>
		<h2 class="w3-container text-light">Update your Stack</h2>
		<table class="table table-hover table-dark w3-animate-bottom">
		<thead class="thead-light">
		  <tr>
        <th>Item Name</th>
				<th>Item Price</th>
				<th>Available Item Quantity</th>
				<th>Updated Item Quantity</th>
			</tr>
		</thead>
		<tbody>

  <?php
      $query = "SELECT * FROM items WHERE ItemID!= ";
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
            <td><?php echo $row['ItemName'];?></td>
						 <td><?php echo $row['ItemPrice'];?></td>
						 <td><?php echo $row['ItemQuantity'];?></td>
						 <td><form action="" method="post">
						 <input type = "text" name="quantity" class="form-control" value="0">
             <button type = "submit" name="approve" class="btn btn-primary">Update</button>
             </td>
             <?php
          }
        }
        ?>
        </tbody>
      </table>
</html>




</body>
</html>
