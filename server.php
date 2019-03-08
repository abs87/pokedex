<?php
session_start();
$firstname="";
$lastname="";
$username="";
$fullname="";
$email="";
$errors=array();
$a="";
$i="";
$query="";
$result="";
//connect to MySQL Database
$db = mysqli_connect('localhost','root','','pokedex');
//if register button clicked
if(isset($_POST['register'])) {
  $firstname= mysqli_real_escape_string($db,$_POST['firstname']);
  $lastname= mysqli_real_escape_string($db,$_POST['lastname']);
  $username= mysqli_real_escape_string($db,$_POST['username']);
  $email= mysqli_real_escape_string($db,$_POST['email']);
  $password1= mysqli_real_escape_string($db,$_POST['password1']);
  $password2= mysqli_real_escape_string($db,$_POST['password2']);
    if($password1 !=  $password2)
    {
      array_push($errors,"password dont match");
    }
    if(count($errors)==0)
    {
      $sql="INSERT INTO users (firstname,lastname,username,email,password) VALUES ('$firstname','$lastname','$username','$email','$password1')";
      $sql3="CALL forinsert('".$_POST['username']."')";
      mysqli_query($db,$sql);
      mysqli_query($db,$sql3);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "you are now logged in";
      header('location: login.php'); //redirect to home page
    }
  }
 //for Login
 if(isset($_POST['login'])) {
   $username = mysqli_real_escape_string($db,$_POST['username']);
   $password = mysqli_real_escape_string($db,$_POST['password']);
   if(empty($username)) {
     array_push($errors,"Username is required");
   }
   if(empty($password)) {
     array_push($errors,"password is required");
   }
   if(count($errors) == 0 ) {
     $query = "SELECT password FROM users  WHERE  username='$username'";
     $result = mysqli_query($db,$query);
     $row=mysqli_fetch_assoc($result);
     if($password==$row['password']){
       $_SESSION['username'] = $username;
       $_SESSION['success'] = "you are now logged in";
       header('location: homepage.php'); //redirect to home page
     }else{
       array_push($errors,"password dont match");
     }
   }
 }
//for changing password
if(isset($_POST['changepass'])) {
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
  $password3 = mysqli_real_escape_string($db,$_POST['password3']);
  $password4 = mysqli_real_escape_string($db,$_POST['password4']);
  if(empty($username)) {
    array_push($errors,"Username is required");
  }
  if(empty($fullname)) {
    array_push($errors,"Fullname  is required");
  }
  if(empty($password3)) {
    array_push($errors,"password is required");
  }
  if(empty($password4)) {
    array_push($errors,"password is require");
  }
  if(count($errors) == 0 ) {
    $query2 = "SELECT fullname FROM users  WHERE  username='$username'";
    $result2 = mysqli_query($db,$query2);
    $row2=mysqli_fetch_assoc($result2);
    if($fullname==$row2['fullname']){
      if($password3==$password4){
        $sql2="UPDATE users SET password='$password4' WHERE username='$username'";
        mysqli_query($db,$sql2);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "you are now logged in";
      header('location: login.php');
    }else{
      array_push($errors,"passwords dont match");   //redirect to login page
    }
    }else{
      array_push($errors,"password cannot be reset check username,fullname");
    }
  }
}
//delete user
if(isset($_POST['deleteuser'])) {
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
  $password3 = mysqli_real_escape_string($db,$_POST['password3']);
  if(empty($username)) {
    array_push($errors,"Username is required");
  }
  if(empty($fullname)) {
    array_push($errors,"Fullname  is required");
  }
  if(empty($password3)) {
    array_push($errors,"password is required");
  }
  if(count($errors) == 0 ) {
    $query = "SELECT password FROM users  WHERE  username='$username'";
    $result = mysqli_query($db,$query);
    $row=mysqli_fetch_assoc($result);
    $query2 = "SELECT fullname FROM users  WHERE  username='$username'";
    $result2 = mysqli_query($db,$query2);
    $row2=mysqli_fetch_assoc($result2);
    if($fullname==$row2['fullname'] && $password3==$row['password']){
        $sql2="DELETE FROM users  WHERE username='$username'";
        mysqli_query($db,$sql2);
      $_SESSION['username'] = $username;
      unset($_SESSION['username']);
      header('location: login.php');
    }else{
      array_push($errors,"Account Cannot Be Deleted check username,fullname");
    }
  }
}

//for Admin
if(isset($_POST['adminlogin'])) {
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password']);
  if(empty($username)) {
    array_push($errors,"Admin name is required");
  }
  if(empty($password)) {
    array_push($errors,"password is required");
  }
  if(count($errors) == 0 ) {
    $query = "SELECT password FROM admin  WHERE  username='$username'";
    $result = mysqli_query($db,$query);
    $row=mysqli_fetch_assoc($result);
    if($password=$row['password']){
      $_SESSION['adminusername'] = $username;
      header('location: admin.php'); //redirect to home page
    }else{
      array_push($errors,"Access Denied!!");
    }
  }
}

//Logout
  if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
  }
?>
