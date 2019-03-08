<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
  </head>
  <body>
      <?php if(isset($_SESSION['success'])): ?>
      <?php unset($_SESSION['success']);?>
      <?php endif ?>
          <?php   if(isset($_SESSION['username']) || isset($_SESSION['adminusername'])):?>
          <?php  if(isset($_SESSION['adminusername'])):?>
            <?php
            echo '<p style="text-align: left"><button class="btn info"> Admin : <strong>';
            echo ''.$_SESSION['adminusername'].'</strong></button>';
            echo '<span style="float:right;"><a  href="login.php?logout=1" style="color: red;text-align-last:justify"><button class="btn danger">Logout</button></a></span></p>';
            ?>
            <?php   if(isset($_SESSION['adminname'])):?>

            <?php endif ?>
            <div class="topnav">
<a class="active" href="admin.php">Admin page</a>
        <a class="active" href="homepage.php">Home</a>
        <div class="dropdown">
          <button class="dropbtn">Type
            <i class="fa fa-caret-down"></i>
          </button>
          <form method='get' action="homepage.php">
          <div class="dropdown-content">
            <a href="homepage.php?type=1">Normal</a>
            <a href="homepage.php?type=2">Fire</a>
            <a href="homepage.php?type=3">Fighting</a>
            <a href="homepage.php?type=4">Water</a>
            <a href="homepage.php?type=5">Flying</a>
            <a href="homepage.php?type=6">Grass</a>
            <a href="homepage.php?type=7">Poison</a>
            <a href="homepage.php?type=8">Electric</a>
            <a href="homepage.php?type=9">Ground</a>
            <a href="homepage.php?type=10">Psychic</a>
            <a href="homepage.php?type=11">Rock</a>
            <a href="homepage.php?type=12">Ice</a>
            <a href="homepage.php?type=13">Bug</a>
            <a href="homepage.php?type=14">Dragon</a>
            <a href="homepage.php?type=15">Ghost</a>
            <a href="homepage.php?type=16">Dark</a>
            <a href="homepage.php?type=17">Steel</a>
            <a href="homepage.php?type=18">Fairy</a>
              </form>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Generation/region
            <i class="fa fa-caret-down"></i>
          </button>
          <form method='get' action="homepage.php">
          <div class="dropdown-content">
            <a href="homepage.php?genid=1">Gen1/Kanto</a>
            <a href="homepage.php?genid=2">Gen2/Johto</a>
            <a href="homepage.php?genid=3">Gen3/Hoenn</a>
            <a href="homepage.php?genid=4">Gen4/Sinnoh</a>
            <a href="homepage.php?genid=5">Gen5/Unova</a>
            <a href="homepage.php?genid=6">Gen6/Kalos</a>
            <a href="homepage.php?genid=7">Gen7/Alola</a>
              </form>
          </div>
        </div>
        <div class="search-container">
          <form action="pokemon.php" method="post">
            <input type="text" placeholder="Enter id" name="search" >
            <button  type="submit" name="submit1" value="search"><?php echo file_get_contents("img/icon2.svg");?></button>
          </form>
        </div>
      </div>
          <?php else: ?>
            <div class="topnav">

        <a class="active" href="homepage.php">Home</a>
        <div class="dropdown">
          <button class="dropbtn">Type
            <i class="fa fa-caret-down"></i>
          </button>
          <form method='get' action="homepage.php">
          <div class="dropdown-content">
            <a href="homepage.php?type=1">Normal</a>
            <a href="homepage.php?type=2">Fire</a>
            <a href="homepage.php?type=3">Fighting</a>
            <a href="homepage.php?type=4">Water</a>
            <a href="homepage.php?type=5">Flying</a>
            <a href="homepage.php?type=6">Grass</a>
            <a href="homepage.php?type=7">Poison</a>
            <a href="homepage.php?type=8">Electric</a>
            <a href="homepage.php?type=9">Ground</a>
            <a href="homepage.php?type=10">Psychic</a>
            <a href="homepage.php?type=11">Rock</a>
            <a href="homepage.php?type=12">Ice</a>
            <a href="homepage.php?type=13">Bug</a>
            <a href="homepage.php?type=14">Dragon</a>
            <a href="homepage.php?type=15">Ghost</a>
            <a href="homepage.php?type=16">Dark</a>
            <a href="homepage.php?type=17">Steel</a>
            <a href="homepage.php?type=18">Fairy</a>
              </form>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Generation/region
            <i class="fa fa-caret-down"></i>
          </button>
          <form method='get' action="homepage.php">
          <div class="dropdown-content">
            <a href="homepage.php?genid=1">Gen1/Kanto</a>
            <a href="homepage.php?genid=2">Gen2/Johto</a>
            <a href="homepage.php?genid=3">Gen3/Hoenn</a>
            <a href="homepage.php?genid=4">Gen4/Sinnoh</a>
            <a href="homepage.php?genid=5">Gen5/Unova</a>
            <a href="homepage.php?genid=6">Gen6/Kalos</a>
            <a href="homepage.php?genid=7">Gen7/Alola</a>
              </form>
          </div>
        </div>
        <div class="search-container">
          <form action="pokemon.php" method="post">
            <input type="text" placeholder="Enter id" name="search" >
            <button  type="submit" name="submit1" value="search"><?php echo file_get_contents("img/icon2.svg");?></button>
          </form>
        </div>
      </div>
      <?php

      echo '<p style="text-align: left"><button class="btn info"> Username:<strong>';
      echo ''.$_SESSION['username'].'</strong></button>';
      echo '<span style="float:right;"><a  href="login.php?logout=1" style="color: red;text-align-last:justify"><button class="btn danger">Logout</button></a></span></p>';

      ?>
      <?php endif ?>
 <?php
 $fresult="";
 $i="";
 $row="";
 $r="";
 $db = mysqli_connect('localhost','root','','pokedex');

//display pokemon details on basis of type

if( isset( $_GET['type'])){

$rquery = $_GET['type'];
echo '<form method="get" action="pokemon.php">';
          echo '<div class="row">';
          if($rquery==1 ||$rquery==2 ||$rquery==3 ||$rquery==4 ||$rquery==5 ||$rquery==6 ||$rquery==7 ||$rquery==8 ||$rquery==9 ||$rquery==10 ||$rquery==11 ||$rquery==12 ||$rquery==13 ||$rquery==14 ||$rquery==15 ||$rquery==16
          ||$rquery==17 ||$rquery==18 )
          {
            $fire="SELECT pokeid,pokename FROM pokemon WHERE type1id=$rquery OR type2id=$rquery";
            $fresult =mysqli_query($db,$fire);
 while ($frow = mysqli_fetch_assoc($fresult) ){

$query2="SELECT * from state where pokeid=$frow[pokeid]";
$state =mysqli_query($db,$query2);
$st = mysqli_fetch_assoc($state);


if($st['pokeid']!=$frow['pokeid']){

  echo '<div class="column">';
echo '<button  type="submit" name="pid" value="'.$frow['pokeid'].'" style="padding: 0; border: none;background: #FFFFFF00 ">';
  echo '<input id="pid1" type="image" style="background: #FFFFFF00 " name="submit" value="pid1" src="img/pokemon/'.$frow['pokeid'].'.png" alt="Submit" onclick = "return setHidden("pid1");" width="200" height="200">';
echo'  </button>';

if($rquery==1){
   echo '<h3 class="typecolornormal">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
   echo '</div>';
 }
 if($rquery==2){
echo '<h3 class="typecolorfire">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==3){
echo '<h3 class="typecolorfighting">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==4){
echo '<h3 class="typecolorwater">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==5){
echo '<h3 class="typecolorflying">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==6){
echo '<h3 class="typecolorgrass">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==7){
echo '<h3 class="typecolorpoison">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==8){
echo '<h3 class="typecolorelectric">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==9){
echo '<h3 class="typecolorground">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==10){
echo '<h3 class="typecolorpsychic">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==11){
echo '<h3 class="typecolorrock">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==12){
echo '<h3 class="typecolorice">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==13){
echo '<h3 class="typecolorbug">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==14){
echo '<h3 class="typecolordragon">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==15){
echo '<h3 class="typecolorghost">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==16){
echo '<h3 class="typecolordark">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==17){
echo '<h3 class="typecolorsteel">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
if($rquery==18){
echo '<h3 class="typecolorfairy">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
echo '</div>';
}
}else{
  echo '<div class="column">';
  echo '<img type="image" class="blurring"  src="img/pokemon/'.$frow['pokeid'].'.png"  width="200" height="200" style="background: #FFFFFF00 ">';
  if($rquery==1){
     echo '<h3 class="typecolornormal">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
     echo '</div>';
   }
   if($rquery==2){
  echo '<h3 class="typecolorfire">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==3){
  echo '<h3 class="typecolorfighting">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==4){
  echo '<h3 class="typecolorwater">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==5){
  echo '<h3 class="typecolorflying">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==6){
  echo '<h3 class="typecolorgrass">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==7){
  echo '<h3 class="typecolorpoison">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==8){
  echo '<h3 class="typecolorelectric">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==9){
  echo '<h3 class="typecolorground">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==10){
  echo '<h3 class="typecolorpsychic">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==11){
  echo '<h3 class="typecolorrock">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==12){
  echo '<h3 class="typecolorice">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==13){
  echo '<h3 class="typecolorbug">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==14){
  echo '<h3 class="typecolordragon">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==15){
  echo '<h3 class="typecolorghost">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==16){
  echo '<h3 class="typecolordark">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==17){
  echo '<h3 class="typecolorsteel">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
  }
  if($rquery==18){
  echo '<h3 class="typecolorfairy">Name:'.$frow['pokename'].':id='.$frow['pokeid'].'</h3>';
  echo '</div>';
}
}
}
}
}

//dropdown for displaying pokemon on the basis of generation or region

else if( isset( $_GET['genid'])){
     $rquery2 = $_GET['genid'];
     echo '<form method="get" action="pokemon.php">';
               echo '<div class="row">';
               if($rquery2==1 ||$rquery2==2 ||$rquery2==3 ||$rquery2==4 ||$rquery2==5 ||$rquery2==6 ||$rquery2==7)
               {
                 $fire2="SELECT pokeid,pokename FROM pokemon WHERE genid=$rquery2";
                 $fresult2 =mysqli_query($db,$fire2);
      while ($frow2 = mysqli_fetch_assoc($fresult2) ){
        $query3="SELECT * from state where pokeid=$frow2[pokeid]";
        $state2 =mysqli_query($db,$query3);
        $st2 = mysqli_fetch_assoc($state2);
          if($st2['pokeid']!=$frow2['pokeid']){
            echo '<div class="column">';
         echo '<button  type="submit" name="pid" value="'.$frow2['pokeid'].'" style="padding: 0; border: none;background: #FFFFFF00 ">';
            echo '<input id="pid1" type="image" style="background: #FFFFFF00 " name="submit" value="pid1" src="img/pokemon/'.$frow2['pokeid'].'.png" alt="Submit" onclick = "return setHidden("pid1");" width="200" height="200">';
         echo'  </button>';
            echo '<h3 style="color: black">Name:'.$frow2['pokename'].':id='.$frow2['pokeid'].'</h3>';
            echo '</div>';
      }else{
echo '<div class="column">';
echo '<img type="image" class="blurring"  src="img/pokemon/'.$frow2['pokeid'].'.png"  width="200" height="200" style="background: #FFFFFF00 ">';
echo '<h3 style="color: black">Name:'.$frow2['pokename'].':id='.$frow2['pokeid'].'</h3>';
echo '</div>';
      }
     }
     }
     echo'</div>';
     echo'</form>';
    }
     else{
            $getfilename = "SELECT pokeid,pokename FROM pokemon";
            $result = mysqli_query($db,$getfilename);
            echo '<form method="get" action="pokemon.php">';
                      echo '<div class="row">';
            while ($row4 = mysqli_fetch_assoc($result) )
            {
              $query4="SELECT * from state where pokeid=$row4[pokeid]";
              $state3 =mysqli_query($db,$query4);
              $st3 = mysqli_fetch_assoc($state3);
              if($st3['pokeid']!=$row4['pokeid']){
                echo '<div class="column">';
             echo '<button  type="submit" name="pid" value="'.$row4['pokeid'].'" style="padding: 0; border: none;background: #FFFFFF00 ">';
                echo '<input id="pid1" type="image" style="background: #FFFFFF00 " name="submit" value="pid1" src="img/pokemon/'.$row4['pokeid'].'.png" alt="Submit" onclick = "return setHidden("pid1");" width="200" height="200">';
             echo'  </button>';
                echo '<h3 style="color: black">Name:'.$row4['pokename'].':id='.$row4['pokeid'].'</h3>';
                echo '</div>';
          }else{
            echo '<div class="column">';
            echo '<img type="image" class="blurring"  src="img/pokemon/'.$row4['pokeid'].'.png"  width="200" height="200" style="background: #FFFFFF00 ">';
            echo '<h3 style="color: black">Name:'.$row4['pokename'].':id='.$row4['pokeid'].'</h3>';
            echo '</div>';
          }
             }
        echo '</div>';
  echo '</form>';
}
?>

<!--==================================-->
<div class="bottom">
  <p align="right">Admins:</p>
   <p align="right">Akshay</p>
   <p align="right">Abhi</p>
 <p align="left">
   <marquee align="left">
     All the characater names,images,stats and characteristics of Pokemon belong to Nintendo,The Pokemon Company, Niantic Labs and Game Freak ,this is a non commercial project done by us for the sole purpose of database management project for our curriculum<br>
   </marquee>
</div>
<?php else:
  header('location:login.php')
?>
<?php endif ?>
  </body>
</html>
