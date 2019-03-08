<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body style="background: url(img/poke2.jpg);background-size: 100%">
  <div class="header">
    <h2>Admin Login</h2>
  </div>
  <form method="post" action="adminlogin.php" >
      <?php include('errors.php'); ?>
<div class="input-group">
  <label>Admin Username</label>
    <input class="inputtext" type="password" name="username" required>
  </div>
    <div class="input-group">
      <label>Admin Password</label>
        <input class="inputtext" type="password" name="password" required>
      </div>
        <div class="input-group">
          <button type="submit" name="adminlogin" class="button3">Admin Login</button>
        </div>
        <p>
          Not a Member yet? <a class="ref" href="register.php"> Sign up</a><br>
          Forgot your Password? <a class="ref" href="changepass.php"> Change your Password</a><br>
          Getting Bored? <a class="ref" href="deleteuser.php"> Delete My Account</a><br>
          Already a Member? <a class="ref" href="login.php"> Sign in</a>
        </p>
  </form>
</body>
</html>
