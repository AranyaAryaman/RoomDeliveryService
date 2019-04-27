<?php

session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');
$name=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * from accounts where Username='".$name."'AND Password='".$password."' limit 1";
$exuser="SELECT * from accounts where Username='".$name."' limit 1";
$result=mysqli_query($con,$sql);
$result2=mysqli_query($con,$exuser);
$num=mysqli_num_rows($result);
$num2=mysqli_num_rows($result2);
if(isset($name)&& isset($password)&& !empty($name) && !empty($password)){
  if($num2==1){
      if($num==1){
        $_SESSION['user_id']=$name;
          header("Location:class/welcome.php");
          exit();
      }
      else{
          echo " You Have Entered Incorrect Password";
          exit();
      }
    }
    else {
      echo "username doesn't exist";
    }
}else
echo "Please Enter valid Username and Password";
?>
