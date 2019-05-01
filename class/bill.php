<?php
  session_start();
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,'users');

  $sql="select * from orders where orderID='$_SESSION[ord_num]'";
  $result=mysqli_query($con,$sql);
  $rown=mysqli_fetch_assoc($result);


  $userid=$_SESSION['user_id'];
  $username=$_SESSION['user_name'];
  $fullname =$_SESSION['full_name'];
  $stat=$rown['Status'];
  $stamp=$rown['Timestamp'];
  $address=$rown['Address'];
  $total=$rown['Amount'];
  $extime=$rown['ExpectedTime'];

  $sql2="select * from orderlist where orderID='$_SESSION[ord_num]'";
  $result2=mysqli_query($con,$sql2);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Generated Bill</title>
    <link rel="stylesheet" type="text/css" href="styletest.css"  />
    <script type="text/javascript">
      function PrintDiv() {
         var divToPrint = document.getElementById('divToPrint');
         var popupWin = window.open('', '_blank', 'width=300,height=300');
         popupWin.document.open();
         popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
          popupWin.document.close();
      }
   </script>
  </head>

  <body background="bill.jpg">
    <header class="clearfix">
      <div id="logo">
        <img src="logoiitg.png">
      </div>
      <div id="company">
        <h2 class="name">General Shop</h2>
        <div>Core 2</div>
        <div>0751-4086908</div>

      </div>
      </div>
    </header>
    <main>
      <div id="divToPrint">
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name"><?php echo $fullname; ?></h2>
          <div class="address"><?php echo $address; ?></div>
          <div class="email">Customer ID <?php echo $_SESSION['user_id']; ?></div>

        </div>
        <div id="invoice">
          <h1>INVOICE NO <?php echo $_SESSION['ord_num']; ?></h1>
          <div class="date">Date of Invoice and Time : <?php echo $stamp; ?></div>

        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">SI. No.</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>

          </tr>
        </thead>
        <tbody>

          <?php
    $i=1;

        while ($row = mysqli_fetch_assoc($result2))
        {

          ?>
        <tr>
          <td class="no">  <?php echo $i; ?> </td>
          <td class="desc">  <?php echo $row['itemName']; ?> </td>
          <td class="unit">  <?php echo $row['itemPrice']; ?> </td>
          <td class="qty">  <?php echo $row['itemQuantity']; ?> </td>
        </tr>
        <?php
          $i+=1;
      }
      ?>
        </tbody>
        <tfoot>




          <tr>
            <td colspan="1"></td>
            <td colspan="2">STATUS :  </td>
            <td><?php if($stat==0) echo "Not Accepted"; else echo "Accepted"; ?></td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="2"><b>EXPECTED TIME AFTER ORDER IS ACCEPTED: </b></td>
            <td><?php echo $_SESSION['time']; ?> minutes</td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="2">GRAND TOTAL : </td>
            <td><?php echo $_SESSION['amount']; ?></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>

      </div>
    </main>

    <div class="form_input" align="center">
    <input type="submit" value="Click Here to Print the Bill" onclick="PrintDiv();" />
  </div>

    <br></br>

      <form action = "signout.php" method="POST">
        <div class="form_input" align="center">
  <input type="submit" name="signout" value="Click Here to Log Out">
  </div>
</form>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
