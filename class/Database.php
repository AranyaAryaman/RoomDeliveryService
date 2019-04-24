<?php

session_start();
<<<<<<< HEAD
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

=======
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
>>>>>>> ccd1e82c4bbe74f97deec68c22b3193038bdcc42
?>
