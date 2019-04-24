<?php

session_start();
$con = mysqli_connect('localhost','root','','users');


if(isset($_POST['submit'])){
$name=$_POST['username'];
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$dept=$_POST['dept'];

$sql= "INSERT INTO `accounts`(`Fullname`, `Username`, `Password`, `Phone`, `Dept`) VALUES ([$fullname],[$name],[$password],[$phone],[$dept])";
mysqli_query($con,$sql);
echo "fuck man";
}
# $_SESSION['message'] = "You have Successfully signed up !" ;
?>
