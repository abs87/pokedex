<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body style="background: url(img/poke2.jpg);background-size: 100%">
  <div class="header">
    <h2>Change your Password</h2>
  </div>
  <form method="post" action="changepass.php" >
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
      <label>New Password</label>
        <input class="inputtext" type="password" name="password3" required>
      </div>
      <div class="input-group">
        <label>Confirm Password</label>
          <input class="inputtext" type="password" name="password4" required>
        </div>
        <div class="input-group">
          <button type="submit" name="changepass" class="button4">Change Password</button>
          <p>
          <a href="login.php" class="ref">Back</a>
        </p>
        </div>
        <p>
        </p>
  </form>
</body>
</html>
