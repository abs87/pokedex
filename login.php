<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body style="background: url(img/poke2.jpg);background-size: 100%">
  <div class="header">
    <h2>Login</h2>
  </div>
  <form method="post" action="login.php" >
      <?php include('errors.php'); ?>
<div class="input-group">
  <label>Username</label>
    <input class="inputtext" type="text" name="username" required pattern="[a-zA-Z0-9]{3,10}"
    title="Please enter an username atleast 3 to 10 characters long starting with an alphabet">
  </div>
    <div class="input-group">
      <label>Password</label>
        <input class="inputtext" type="password" name="password" required>
      </div>
        <div class="input-group">
          <button type="submit" name="login" class="button1">Login</button>
        </div>
        <p>
          Not a Member yet? <a class="ref" href="register.php"> Sign up</a><br>
          Forgot your Password? <a class="ref" href="changepass.php"> Change your Password</a><br>
          Getting Bored? <a class="ref" href="deleteuser.php"> Delete My Account</a><br>
          Go To Admin Panel</button><a class="ref" href="adminlogin.php"> Login As Admin</a><br>
        </p>
  </form>
</body>
</html>
