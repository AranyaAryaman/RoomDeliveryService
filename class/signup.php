<!DOCTYPE html>
<html>
<head>
<title> Signup Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div class= "signupbox">
      <img src="avatar.png" class="avatar">
      <h1>
        Register Now
      </h1>
      <form action="Database.php" method="POST" >
        <div class="form_input">
        <p>Name</p>
        <input type="text" name="fullname" placeholder="Enter Your Name">
        </div>
        <div class="form_input">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div class="form_input">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        </div>
        <div class="form_input">
        <p>Phone Number</p>
        <input type="text" name="phone" placeholder="Enter Your Phone Number">
        </div>
        <div class="form_input">
        <p>Department</p>
        <input type="text" name="dept" placeholder="Enter your Department">
        </div>
        <input type="submit" name="submit" value="Sign Up">
      </form>

</body>
</html>
