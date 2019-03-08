<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<title>Remove My Account</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body style="background: url(img/poke2.jpg);background-size: 100%">
  <div class="header">
    <h2>Remove My Account</h2>
  </div>
  <form method="post" action="deleteuser.php" >
      <?php include('errors.php'); ?>
<div class="input-group">
  <label>Username</label>
    <input class="inputtext" type="text" name="username" required pattern="[a-zA-Z0-9]{3,10}"
    title="Please enter an username atleast 3 to 10 characters long starting with an alphabet">
  </div>
  <div class="input-group">
    <label>Full Name</label>
      <input class="inputtext" type="text" name="fullname" required>
    </div>
    <div class="input-group">
      <label>Password</label>
        <input class="inputtext" type="password" name="password3" required>
      </div>
        <div class="input-group">
          <button type="submit" name="deleteuser" class="button2">Remove My Account
          </button>
          <p>
          <a href="register.php" class="ref">Back</a>
        </p>
        </div>
        <p>
        </p>
  </form>
</body>
</html>
