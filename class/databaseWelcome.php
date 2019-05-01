<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');

  $date = date_create();
  //echo date_timestamp_get($date);

  if(isset($_POST['confirm']) && !empty($_POST['confirm'])){

       mysqli_select_db($con,'orders');
       $querry= "SELECT COUNT(*) FROM orders";
       $result2 = mysqli_query($con,$querry);
       $row=mysqli_fetch_array($result2);
       $row[0] += 1;
       $temp = time();
       $_SESSION['ord_num'] = $row[0];
       $_SESSION['deliver'] = $_POST['address'];
       mysqli_select_db($con,'orders');
       $q = "INSERT INTO `orders`(`orderID`, `userID`, `userName`, `Address`, `Status`, `Amount`, `ExpectedTime`) VALUES ('$row[0]','$_SESSION[user_id]','$_SESSION[user_name]','$_POST[address]',0,'$_SESSION[amount]',20)";
       mysqli_query($con,$q);
       header("location: Welcome.php");
    }
?>
