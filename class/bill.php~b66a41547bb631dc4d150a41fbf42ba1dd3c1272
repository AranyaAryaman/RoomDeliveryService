<?php
  session_start();
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,'users');

  $sql="select * from orders where userID=$_SESSION['user_id'] limit 1 ";
  $result=mysqli_query($con,$sql);
  $rown=mysqli_fetch_assoc($result);
  $invoice=$rown['orderID'];
  $userid=$rown['userID'];
  $username=$rown['userName'];
  $stat=$rown['Status'];
  $stamp=$rown['Timestamp'];
  $address=$rown['Address'];
  $total=$rown['Amount'];
  $extime=$rown['ExpectedTime'];

  $sql2="select * from orderlist where orderID='.$invoice.' limit 1 ";

  $result2=mysqli_query($con,$sql2);
  $row=mysqli_fetch_assoc($result2);



?>
<html>
<head>
  <title>Generated Bill</title>
</head>
<body>
  <table align="center" border="1px" style="width:600px ; line-height:40px;">
    <tr>
        <th colspan="4"><h3>Your  Bill</h3></th>
    </tr>
    <tr>
        <th colspan="1"><h3>Invoice No.: <?php echo $invoice; ?></h3></th>
        <th colspan="2"><h3>Name: <?php echo $username; ?></h3></th>
        <th colspan="1"><h3>Time: <?php $t=time(); echo $t ;?></h3></th>
    </tr>
    <tr>
      <th> Sl. No. </th>
      <th> Items Selected </th>
      <th> Price/Unit </th>
      <th> Selected Quantity </th>
    </tr>
    <?php
    $i=1;
        while (mysqli_fetch_array($result2))
        {


    ?>
        <tr align="center">
          <td>  <?php echo $i; ?> </td>
          <td>  <?php echo '$rows[ItemName]'; ?> </td>
          <td>  <?php echo '$rows[ItemPrice]'; ?> </td>
          <td>  <?php echo $row['itemQuantity']; ?> </td>


              </div>
            </td>
        </tr>
        <?php
          $i+=1;
      }
      ?>
      <tr>
        <td colspan="2"> Expected Time: <?php echo $extime; ?> </td>
        <td  colspan="2"> Total Amount: <?php echo $total; ?></td>
      </tr>
      <tr>
        <td colspan="3"> Address: <?php echo $address; ?></td>
        <td colspan="1"> status: <?php if($stat==0) echo "Incomplete"; else echo "Delivered"; ?> </td>
      </tr>

    </form>
    </table>
<br><br><br>





</body>
</html>
