<?php

session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
$name=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * from accounts where Username='".$name."'AND Password='".$password."' limit 1";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if(isset($name)&& isset($password)&& !empty($name) && !empty($password)){
  if($num==1){
      echo " You Have Successfully Logged in";
      exit();
  }
  else{
      echo " You Have Entered Incorrect Password";
      exit();
  }
}else
echo "Please Enter valid Username and Password";
?>
