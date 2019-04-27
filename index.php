
<!DOCTYPE html>
<html>
<head>
<title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div class= "loginbox">
      <img src="avatar.png" class="avatar">
      <h1>
        Login Here
      </h1>
      <form action="Database.php" method="POST" >
        <div class="form_input">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Your Username">
        </div>
        <div class="form_input">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Your Password">
        </div>
        <input type="submit" name="submit" value="Login">
        <a href="class/forgot.php">Forgot password?</a><br>
        <a href="class/signup.php">Create a new account</a>
      </form>
    </div>
</body>
</html>
