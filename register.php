<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<title>User Registration</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body style="background: url(img/poke2.jpg);background-size: 100%">
  <div class="header">
    <h2>Register</h2>
  </div>
  <form method="post" action="register.php">
  <?php include('errors.php'); ?>
  <div class="input-group">
    <label>First Name</label>
    <input class="inputtext" type="text" name="firstname" value="<?php echo $firstname; ?>" required pattern="[a-zA-Z]{3,10}"
    title="Please enter first name consisting only of alphabets">
  </div>
  <div class="input-group">
    <label>Last Name</label>
    <input class="inputtext" type="text" name="lastname" value="<?php echo $lastname; ?>" required pattern="[a-zA-Z]{3,10}"
    title="Please enter last name consisting only of alphabets">
  </div>
<div class="input-group">
  <label>Username</label>
    <input class="inputtext" type="text" name="username" value="<?php echo $username; ?>" required pattern="[a-zA-Z0-9]{3,10}"
    title="Please enter an username atleast 3 to 10 characters long starting with an alphabet">
  </div>
  <div class="input-group">
    <label>Email</label>
      <input class="inputtext" type="text" name="email" value="<?php echo $email; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
      title="Please enter the email in the format ab@ab.com">
    </div>
    <div class="input-group">
      <label>Password</label>
        <input class="inputtext" type="password" name="password1" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 to 15 characters">
      </div>
      <div class="input-group">
        <label>ConfirmPassword</label>
          <input class="inputtext" type="password" name="password2" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"
          title="Please enter the password correctly">
        </div>
        <div class="input-group">
          <button type="submit" name="register" class="button5">Register</button>
        </div>
        <p>
          Already a Member? <a class="ref" href="login.php"> Sign in</a>
        </p>
  </form>
</body>
</html>
