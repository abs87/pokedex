<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin </title>
    <link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <body>
    <!--=======================================-->
    <form method="get">
    <div id="mySidebar" class="sidebar">

      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="admin.php?home=1">home</a>
      <a href="admin.php?insert=1">insert</a>
      <a href="admin.php?update=1">update</a>
      <a href="admin.php?state=1">state</a>

    </div>
  </form>
  <?php if(isset($_GET['home'])): ?>
  <?php header('location: homepage.php');?>
  <?php endif ?>
    <div id="main">

      <button class="openbtn" onclick="openNav()">&#9776;Menu</button><div align="center"><h2>Admin Page</h2></div>

      <?php if(isset($_GET['home'])): ?>
      <?php 'location:homepage.php';?>
      <?php endif ?>
          <!--===================Deleting pokemon======================-->

<?php if(isset($_GET['update'])):?>
      <h2 align="center">Update</h2>
          <form method="post">

      <table align="center">
        <tr>
        <td style="font-size:20px">pokemon id:</td><td><input type="text" name="id"  class="in" ></td>
        </tr>
          <tr>
        <td style="font-size:20px">height:</td><td><input type="text" name="arr[0]"  class="in" ></input>
      </td></tr>
        <tr>
        <td style="font-size:20px">weight:</td><td><input type="text" name="arr[1]"  class="in" ></input>
      </td></tr>
      </table>
      <div align="center">
      <button  type="submit" name="up"  class="button4">update</button>
      </div>

      </form>

        <?php

      $array=array();
        $db = mysqli_connect('localhost','root','','pokedex');
        //if register button clicked
        if(isset($_REQUEST['up'])) {
          //if(isset($_REQUEST['arr'])) {
          $id=$_REQUEST['id'];
      $array=$_REQUEST['arr'];



      if(!empty($array[0])){
        $query2="UPDATE pokemon set height=$array[0] where pokeid=$id";
        mysqli_query($db,$query2);
      }

      if(!empty($array[1])){
        $query2="UPDATE pokemon set weight=$array[1] where pokeid=$id";
        mysqli_query($db,$query2);
      }
      /*foreach ($array as $key => $value) {
        echo $key." : ".ucfirst($value). "<br/>";
        // code...
      }
      echo $array[0];
      echo '<br/>';
      echo $array[1];
      }*/
      }


      ?>
      <?php endif ?>
        <!--===================inserting pokemon======================-->
        <?php if(isset($_GET['insert'])): ?>
        <h2 align="center">Insert</h2>
        <form method="post">

      <table align="center">
      <tr>
        <td style="font-size:20px">pokemon id:</td><td style="padding-right: 100px;"><input type="text" name="id"  class="in" ></td>

      <td style="padding-left: 100px;font-size:20px">pokemon name:</td><td><input type="text" name="arr[0]"  class="in" ></input>
      </td></tr>
      <tr>
      <td style="font-size:20px">height:</td><td style="padding-right: 100px;"><input type="text" name="arr[1]"  class="in" ></input>
      </td>

      <td style="padding-left: 100px;font-size:20px">weight:</td><td><input type="text" name="arr[2]"  class="in" ></input>
      </td></tr>
      <tr>
        <td style="font-size:20px">genid:</td><td style="padding-right: 100px;"><input type="text" name="arr[3]"  class="in" ></td>

      <td style="padding-left: 100px;font-size:20px">type1</td><td><input type="text" name="arr[4]"  class="in" ></input>
      </td></tr>
      <tr>
      <td style="font-size:20px">type2</td><td style="padding-right: 100px;"><input type="text" name="arr[5]"  class="in" ></input>
      </td>
    <td style="padding-left: 100px;font-size:20px">category</td><td><input type="text" name="arr[6]"  class="in" ></input>
      </td></tr>
      <tr>
      <td style="font-size:20px">hp</td><td style="padding-right: 100px;"><input type="text" name="arr[7]"  class="in" ></input>
      </td>
      <td style="padding-left: 100px;font-size:20px">attack</td><td><input type="text" name="arr[8]"  class="in" ></input>
      </td></tr>
      <tr>
      <td style="font-size:20px">defence</td><td style="padding-right: 100px;"><input type="text" name="arr[9]"  class="in" ></input>
      </td>
      <td style="padding-left: 100px;font-size:20px">spAttack</td><td><input type="text" name="arr[10]"  class="in" ></input>
      </td></tr>
      <tr>
      <td style="font-size:20px">spDefence</td><td style="padding-right: 100px;"><input type="text" name="arr[11]"  class="in" ></input>
      </td>
      <td style="padding-left: 100px;font-size:20px">speed</td><td><input type="text" name="arr[12]"  class="in" ></input>
      </td></tr>


      </table>
    </table>
      <div align="center">
      <button  type="submit" name="insert"  class="button5">Insert</button>
      </div>
      </form>

      <?php
      $db = mysqli_connect('localhost','root','','pokedex');
      //if register button clicked
      if(isset($_REQUEST['insert'])) {
        //if(isset($_REQUEST['arr'])) {
        if(isset($_REQUEST['id'])) {
          $id=$_REQUEST['id'];
        }
          if(isset($_REQUEST['arr'])) {
            $array=$_REQUEST['arr'];
          }



      if(!empty($array[4])){
        $query="SELECT typeid from type where tname='$array[4]'";
        $result=mysqli_query($db,$query);
        $row=mysqli_fetch_assoc($result);
        $type1=$row['typeid'];
      }else{
        $type1=NULL;
      }
      if(!empty($array[5])){
        $query="SELECT typeid from type where tname='$array[5]'";
        $result=mysqli_query($db,$query);
        $row1=mysqli_fetch_assoc($result);
        $type2=$row1['typeid'];
      }else{
        $type2=NULL;
      }


      if(!empty($array[0]) & !empty($array[1]) & !empty($array[2])  & !empty($array[3]) & !empty($array[6]) ){
      $query2="INSERT INTO pokemon (pokeid,pokename,height,weight,genid,type1id,type2id,category) VALUES ('$id','$array[0]','$array[1]','$array[2]','$array[3]','$type1','$type2','$array[6]')";
      mysqli_query($db,$query2);
      }
      if(!empty($array[7]) & !empty($array[8]) & !empty($array[9])  & !empty($array[10]) & !empty($array[11]) & !empty($array[12])){
        $query2="INSERT INTO stats (pokeid,hp,attack,defence,spattack,spdefence,speed) VALUES ('$id','$array[7]','$array[8]','$array[9]','$array[10]','$array[11]','$array[12]')";
        mysqli_query($db,$query2);

      }






      }

      ?>
<?php endif ?>
        <!--=========================================-->
          <!--====================enable or disable=====================-->
          <?php if(isset($_GET['state'])): ?>
          <h2 align="center">enable or disable a pokemon</h2>
          <form method="post">
          <table align="center">
          <tr>
            <td style="font-size:20px">pokemon id:</td><td><input type="text" name="id"  class="in" ></td>


          <td><button  type="submit" name="enable"  class="button2">Enable</button></td><td><button  style="float:right;" type="submit" name="disable"  class="button3">Disable</button>
          </td></tr>
      </table>
      </form>
      <?php

      $array=array();

      $db = mysqli_connect('localhost','root','','pokedex');
      //if register button clicked
      if(isset($_REQUEST['id'])) {
        $id=$_REQUEST['id'];
      if(isset($_REQUEST['disable'])) {
        //if(isset($_REQUEST['arr'])) {
        $t="inactive";
        $query="INSERT into state (pokeid,pokestate) values ('$id','$t')";
        mysqli_query($db,$query);
      }
      if(isset($_REQUEST['enable'])){
        $query1="DELETE from state  where pokeid='$id'";
        mysqli_query($db,$query1);
      }
      }

        ?>
        <?php

      ?>
<?php endif ?>

    </div>
<script>
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
</script>

<!--<form action="admin.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file"><br><br>
<input type="Submit" value="Submit">
</form>-->




<!--  <div align="right"><a href="homepage.php" ><button  type="submit" name="enable"  class="button1">home</button></a></div>-->

  </body>
</html>
