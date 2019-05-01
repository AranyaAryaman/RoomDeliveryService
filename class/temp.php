<?php
  session_start();
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,'users');

  $sql="select * from orders where orderID='$_SESSION[ord_num]'";
  $result=mysqli_query($con,$sql);
  $rown=mysqli_fetch_assoc($result);


  $userid=$_SESSION['user_id'];
  $username=$_SESSION['user_name'];
  $stat=$rown['Status'];
  $stamp=$rown['Timestamp'];
  $address=$rown['Address'];
  $total=$rown['Amount'];
  $extime=$rown['ExpectedTime'];

  $sql2="select * from orderlist where orderID='$_SESSION[ord_num]'";
  $result2=mysqli_query($con,$sql2);
  $row=mysqli_fetch_assoc($result2);

?>


<html>
<head>
  <title>Generated Bill</title>
</head>
<body>
  <table align="center" border="0.25px" style="width:800px ; line-height:60px;">
    <tr>
        <th colspan="4"><h2>Core 2 Shop</h2></th>
    </tr>
    <tr>
        <th colspan="4"><h3>Invoice</h3></th>
    </tr>
    <tr>
        <td colspan="1"><h3 align="left">Invoice No.: <?php echo $_SESSION['ord_num']; ?></h3></td>
        <td colspan="2"><h3 align="left">Name: <?php echo $username; ?></h3></td>
        <td colspan="1"><h3 align="left">Time: <?php echo $stamp; ?></h3></td>
    </tr>
    <tr>
        <td colspan="4"><h3 align="left">Delivery Address: <?php echo $address; ?></h3></td>
    </tr>
    <tr>
        <th colspan="4"><h3 align="left">Payment Mode: Cash/Paytm/Bhim </h3></th>
    </tr>
    <tr>
      <th> Sl. No. </th>
      <th> Item Name</th>
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
          <td>  <?php echo $row['itemID']; ?> </td>
          <td>  <?php echo $row['orderID']; ?> </td>
          <td>  <?php echo $row['itemQuantity']; ?> </td>


              </div>
            </td>
        </tr>
        <?php
          $i+=1;
      }
      ?>
      <tr>
        <td colspan="2"> <h3 align="center"> Status: <?php if($stat==0) echo "Incomplete"; else echo "Delivered"; ?>  <h3> </td>
        <td  colspan="2"> <h2 align="right"> Total Amount:  Rs.<?php echo $_SESSION['amount']; ?> </h2></td>
      </tr>
      <tr>
        <td colspan="4"><h3 align="center"> Expected Time: <?php echo $extime; ?> minutes </h3> </td>
      </tr>

    </form>
    </table>
<br><br><br>





</body>
</html>
