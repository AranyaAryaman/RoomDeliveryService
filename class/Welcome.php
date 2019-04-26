<?php
  #session_start();
  include_once('signupDatabase.php');
  echo "Hello " , $_SESSION['user_id'];
  include_once('signupDatabase.php');
  $query= "SELECT * from items WHERE ItemQuantity > 0 ";

  $result = mysqli_query($con,$query);
?>
<html>
<head>
  <title> Welcome </title>
</head>
<body>
  <table align="center" border="1px" style="width:600px ; line-height:40px;">
    <tr>
      <th colspan="4"><h3>PLACE YOUR ORDER <i>(from available items)</i></h3></th>
    </tr>
    <tr>
      <th> Item Name </th>
      <th> Price/Unit </th>
      <th> Available Quantity </th>
      <th> Selected Quantity </th>
    </tr>
    <?php
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <tr align="center">
          <td>  <?php echo $rows['ItemName']; ?> </td>
          <td>  <?php echo $rows['ItemPrice']; ?> </td>
          <td>  <?php echo $rows['ItemQuantity']; ?> </td>
          <td align="center">   <form action="databaseWelcome.php" method="POST" >
              <div class="form_input">
              <input type="text" name="selected" placeholder="Select Quantity">
              </div>
            </td>
          </form>
        </tr>
        <?php
      }
      ?>
    </table>
<br><br><br>

<?php
  if(isset($_POST['selected'])){


  }
?>

<form action="databaseWelcome.php" method="POST">
  <div class="form_input">
  <input type="submit" name="submit" value="Place your Order">
  </div>
</form>

</body>
</html>
