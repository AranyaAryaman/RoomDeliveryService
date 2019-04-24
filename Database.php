<?php

session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'demo');
$name=$_POST['username'];
$password=$_POST['password'];
$sql="select * from loginform where User='".$name."'AND Pass='".$password."' limit 1";
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
