<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
$name=$_POST['username'];
$phone=$_POST['phone'];
$sql="SELECT * from accounts where Username='".$name."'AND Phone='".$phone."' limit 1";
$exuser="SELECT * from accounts where Username='".$name."' limit 1";
$result=mysqli_query($con,$sql);
$result2=mysqli_query($con,$exuser);
$num=mysqli_num_rows($result);
$num2=mysqli_num_rows($result2);
if(isset($name)&& isset($phone)&& !empty($name) && !empty($phone)){
  if($num2==1){
      if($num==1){
        $ex=mysqli_query($con,"SELECT * from accounts where Username='".$name."' limit 1");
        $row=mysqli_fetch_assoc($ex);
          echo " Your Password : ".$row['Password'];
          exit();
      }
      else{
          echo " You Have Entered Incorrect Phone Number";
          exit();
      }
    }
    else {
      echo "username doesn't exist";
    }
}else
echo "Please Enter valid Username and Phone Number";
?>
