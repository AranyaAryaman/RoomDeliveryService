<?php

session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');

$name=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$dept=$_POST['dept'];
$sql="select * from accounts where Username='".$name."' limit 1";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);

if(!empty($name) && !empty($password) && !empty($phone) && !empty($dept) && !empty($fullname)){
  if($password==$password2){
    if($num==1){
        echo " Username already taken";
    }
    else{
      $reg= "insert into accounts(`Fullname`, `Username`, `Password`, `Phone`, `Dept`) values ('$fullname','$name','$password','$phone','$dept')";
      mysqli_query($con,$reg);
      echo "Registration Successful";
    }
  }
  else echo "Password doesn't match";
}
else
echo "Enter required fields";

?>
