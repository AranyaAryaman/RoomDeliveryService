
<!DOCTYPE html>
<html>
<head>
<title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="style_hotel.css">
    </head>
<body>
    <div class= "loginbox">
      <img src="avatar.png" class="avatar">
      <h1>
        Login Here
      </h1>
      <form action="hotel_database.php" method="POST" >
        <div class="form_input">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Your Username">
        </div>
        <div class="form_input">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Your Password">
        </div>
        <input type="submit" name="submit" value="Login">
      </form>
    </div>
</body>
</html>
