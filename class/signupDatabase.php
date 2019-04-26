<?php

session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'users');

if(isset($_POST['submit'])){

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
          $querry= "SELECT COUNT(*) FROM accounts";
          mysqli_query($con,$querry);
          $result2 = mysqli_query($con,$querry);
         $row=mysqli_fetch_array($result2);
         // echo "$row[0]";
          $row[0] += 1;
          $reg= "INSERT into accounts(`UserID`,`Fullname`, `Username`, `Password`, `Phone`, `Dept`) values ('$row[0]','$fullname','$name','$password','$phone','$dept')";
          mysqli_query($con,$reg);
          $result3 = mysqli_query($con,$reg);
          $_SESSION['user_id']= $name;
          header("Location: Welcome.php");

         //$num2 = mysqli_affected_rows($result3);
      //   if($result3 == true){
      //  //echo "Registration Successful"
      //     echo "<script type='text/javascript'>alert('Registration Successful!')</script>";
      // // header("Location: Welcome.php");
      //   }
      //   else{
      //    echo "<script type='text/javascript'>alert('Registration Failed!')</script>";
      //   }
     }
    }
    else {
      echo "<script type='text/javascript'>alert('The Passwords don't match!')</script>";
    }
  }
  else{
    echo "<script type='text/javascript'>alert('Enter the required fields')</script>";
  }
}
?>
