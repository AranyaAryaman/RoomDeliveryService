<?php

// include_once("Welcome.php");
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');

if(isset($_POST['submit'])){
   $ts = date("Y-m-d H:i:s");
  $querry= "SELECT COUNT(*) FROM orders";
    mysqli_query($con,$querry);
  $result2 = mysqli_query($con,$querry);
 $row=mysqli_fetch_array($result2);

 $querry2= "SELECT COUNT(*) FROM orderlist";
   $result = mysqli_query($con,$querry2);
   $row2 =mysqli_fetch_assoc($result);
   $time =0;

 if($row2['itemID'] == 1 ){
   $time = $row2['itemQuantity'];
 }

 if($row2['itemID'] == 2){
   $time = $time + $row2['itemQuantity'];
 }


  $row[0] += 1;
  $reg="INSERT INTO `orders`(`orderID`, `userID`, `userName`, `Address`, `Timestamp`, `Status`, `Amount`, `ExpectedTime`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";
  $result3 = mysqli_query($con,$reg);
  echo 'Data Inserted';}
?>
