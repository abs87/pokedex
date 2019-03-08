<!DOCTYPE html>
<html>
  <head>
    <title>pokemon details</title>
    <link rel="stylesheet" type="text/css" href="pokemonstyle.css">
  </head>
  <body>

<?php
    $db = mysqli_connect('localhost','root','','pokedex');
    $id = '';

//search debug_backtrace
   if(isset($_REQUEST['submit1'])){
         echo '<div class="content" >';
         $name=$_POST['search'];
          $query= "SELECT pokeid,pokename,genid FROM pokemon WHERE pokeid='$name' OR pokename='$name'";
          $sql=mysqli_query($db,$query);
          $row = mysqli_fetch_assoc($sql);
          if($name==$row['pokeid'] || $name==$row['pokename']){
          $query16="SELECT * from state where pokeid=$row[pokeid]";
          $state3 =mysqli_query($db,$query16);
          $st3 = mysqli_fetch_assoc($state3);
          if($st3['pokeid']!=$row['pokeid']){
          echo '<img src="img/pokemon/'.$row['pokeid'].'.png" alt="image" class="center" width=50 height=500>';
          echo '<h2 align="center">';
          echo strtoupper($row['pokename']);
          echo '</h2>';
          echo '<h3  style="font-size:25px">Profile</h3>';
          $query2= "SELECT * FROM pokemon WHERE pokeid='$row[pokeid]'";
          $sql2=mysqli_query($db,$query2);
          $row2= mysqli_fetch_assoc($sql2);

          $query3="SELECT tname FROM type WHERE typeid=(SELECT type1id FROM pokemon WHERE pokeid='$row[pokeid]')";
          $sql3=mysqli_query($db,$query3);
          $row3=mysqli_fetch_assoc($sql3);

          $query4="SELECT tname FROM type WHERE typeid=(SELECT type2id FROM pokemon WHERE pokeid='$row[pokeid]')";
          $sql4=mysqli_query($db,$query4);
          $row4=mysqli_fetch_assoc($sql4);

          $query5="SELECT * FROM STATS WHERE pokeid='$row[pokeid]'";
          $sql5=mysqli_query($db,$query5);
          $row5=mysqli_fetch_assoc($sql5);

          $query6="SELECT regionname from gen WHERE genid='$row[genid]'";
          $sql6=mysqli_query($db,$query6);
          $row6=mysqli_fetch_assoc($sql6);
          echo '<div class="container">
          <div class="floatLeft">
          <table>
          <tr><td style="font-size:20px" width=50%>Pokemon Id</td> <td style="font-size:20px">: #'.$row2['pokeid'].'</td></tr>
          <tr><td style="font-size:20px" width=50%>height</td> <td  style="font-size:20px">: '.$row2['height'].'</td></tr>
          <tr><td style="font-size:20px" width=50%>Weight</td> <td  style="font-size:20px">: '.$row2['weight'].'</td></tr>
          </table>
          </div>
          <div class="floatRight">
          <table>
          <tr><td style="font-size:20px" width=50%>Generation </td> <td  style="font-size:20px">: '.$row2['genid'].'</td></tr>
          <tr><td style="font-size:20px" width=50%>Region</td> <td  style="font-size:20px">: '.$row6['regionname'].'</td></tr>
          <tr><td style="font-size:20px" width=50%>Category</td> <td  style="font-size:20px">: '.$row2['category'].'</td></tr>
          </table>
          </div>
          </div>';
          echo '<h3  style="font-size:25px">Type</h3>
          <table>
          <tr><td style="font-size:20px" width=50%>Type1</td> <td style="font-size:20px">:  '.$row3['tname'].'</td></tr>
          <tr>';
          if($row3>0){
          echo '<td style="font-size:20px" width=50%>Type2</td> <td  style="font-size:20px">:  '.$row4['tname'].'</td>';
          }
          else{
            echo '<td style="font-size:20px" width=50%>Type2</td><td style="font-size:20px">:  NIL</td>';
          }
          echo '</tr>
          </table>';
          //select type stats
          $query11="SELECT tname FROM `type` WHERE typeid in
          (select strongtypeid from strongagainsttype where typeid in(select type1id from pokemon where pokeid='$row[pokeid]'))";
          $sql11=mysqli_query($db,$query11);
          $query12="SELECT tname FROM `type` WHERE typeid in
          (select strongtypeid from strongagainsttype where typeid in (select type2id from pokemon where pokeid='$row[pokeid]'  or  not type1id))";
          $sql12=mysqli_query($db,$query12);
          $query13="SELECT tname FROM `type` WHERE typeid in
          (select weaktypeid from weakagainsttype where typeid in(select type1id from pokemon where pokeid='$row[pokeid]'))";
          $sql13=mysqli_query($db,$query13);
          echo '<h3  style="font-size:25px">Type Stats</h3>';
          echo '<table>
          <tr>
          <td style="font-size:20px" width=50%>Strong Against </td>';
          while ($row11=mysqli_fetch_assoc($sql11) ){
          echo '<td style="font-size:20px ">   '.$row11['tname'].'</td>';
          }
          while ($row12=mysqli_fetch_assoc($sql12) ){
          echo '<td style="font-size:20px ">   '.$row12['tname'].'</td>';
          }
          echo '</tr>
          <td style="font-size:20px" width=50%>Weak Against</td>';
          while ($row13=mysqli_fetch_assoc($sql13) ){
          echo '<td style="font-size:20px ">   '.$row13['tname'].'</td>';
          }
          echo '</tr>
          </table>';
          echo '<h3  style="font-size:25px">Stats</h3>
          <div class="container">
          <div class="floatLeft">
          <table>
          <tr><td style="font-size:20px" width=50%>HP</td> <td style="font-size:20px">: '.$row5['hp'].'</td></tr>
          <tr><td style="font-size:20px" width=50%>Attack</td> <td  style="font-size:20px">: '.$row5['attack'].'</td></tr>
          <tr><td style="font-size:20px" width=50%>Defense</td> <td  style="font-size:20px">: '.$row5['defence'].'</td></tr>
          </table>
          </div>
          <div class="floatRight">
          <table>
          <tr><td style="font-size:20px" width=60%>Special Attack</td> <td style="font-size:20px">: '.$row5['spattack'].'</td></tr>
          <tr><td style="font-size:20px" width=60%>Special Defense</td> <td  style="font-size:20px">: '.$row5['spdefence'].'</td></tr>
          <tr><td style="font-size:20px" width=60%>Speed</td> <td  style="font-size:20px">:'.$row5['speed'].'</td></tr>
          </table>
          </div>
          </div>';
          echo '<h3  style="font-size:25px">Evolution</h3>';
          //display evolution images
          $q8="SELECT * FROM evolvechain WHERE s1id='$row[pokeid]'  OR s2id='$row[pokeid]' OR s3id='$row[pokeid]'";
          $query8=mysqli_query($db,$q8);
          $row8=mysqli_fetch_assoc($query8);
          $q14="SELECT s1evllvl FROM evolvechain WHERE s1id='$row[pokeid]' OR s2id='$row[pokeid]' OR s3id='$row[pokeid]'";
          $query14=mysqli_query($db,$q14);
          $row14=mysqli_fetch_assoc($query14);
          $q15="SELECT s2evllvl FROM evolvechain WHERE s1id='$row[pokeid]' OR s2id='$row[pokeid]' OR s3id='$row[pokeid]'";
          $query15=mysqli_query($db,$q15);
          $row15=mysqli_fetch_assoc($query15);
          if($row8>0){
          echo '<table>';
          echo '<tr>';
          echo'<td><img src="img/pokemon/'.$row8['s1id'].'.png" alt="image" width=150 height=150></td>';
          echo '<td style="font-size:20px" width=50%>'.$row14['s1evllvl'].'</td>';
          echo '<td><img src="img/pokemon/'.$row8['s2id'].'.png" alt="image" width=150 height=150></td>';
          echo '<td style="font-size:20px" width=50%>'.$row15['s2evllvl'].'</td>';
          echo '<td><img src="img/pokemon/'.$row8['s3id'].'.png" alt="image"  width=150 height=150></td>';
          echo '</tr>';
          echo '</table>';
          }
          else{
            echo'N/A';
          }
          echo '<h3  style="font-size:25px">Moves</h3>
          <div class="container">
          <div class="floatLeft">';
          //display move details
          $query6="SELECT * FROM move WHERE mtypeid in(select type1id from pokemon where pokeid='$row[pokeid]')";
          $sql6=mysqli_query($db,$query6);
          $query9="SELECT * FROM move WHERE mtypeid in(select type2id from pokemon where pokeid='$row[pokeid]')";
          $sql9=mysqli_query($db,$query9);
          echo '<table>
          <tr><td style="font-size:20px" width=50%>Move name</td>
          <td style="font-size:20px" width=50%>Move Type</td>
          <td style="font-size:20px" width=50%>Power</td>
          <td style="font-size:20px" width=50%>Accuracy</td>
          <td style="font-size:20px" width=50%>PP</td>
          </tr>';
          while ($row6=mysqli_fetch_assoc($sql6) ){
            //display move type name
            $query7="SELECT tname FROM type WHERE typeid =(SELECT mtypeid from move where mid=$row6[mid])";
            $sql7=mysqli_query($db,$query7);
            $row7=mysqli_fetch_assoc($sql7);
          echo '<tr>
          <td style="font-size:20px">'.$row6['mname'].'</td>
          <td style="font-size:20px">'.$row7['tname'].'</td>
          <td  style="font-size:20px">'.$row6['power'].'</td>
          <td  style="font-size:20px">'.$row6['accuracy'].'</td>
          <td style="font-size:20px">'.$row6['pp'].'</td>
          </tr>';
          }
          while ($row9=mysqli_fetch_assoc($sql9) ){
            //display move type name
            $query10="SELECT tname FROM type WHERE typeid =(SELECT mtypeid from move where mid=$row9[mid])";
            $sql10=mysqli_query($db,$query10);
            $row10=mysqli_fetch_assoc($sql10);
          echo '<tr>
          <td style="font-size:20px">'.$row9['mname'].'</td>
          <td style="font-size:20px">'.$row10['tname'].'</td>
          <td  style="font-size:20px">'.$row9['power'].'</td>
          <td  style="font-size:20px">'.$row9['accuracy'].'</td>
          <td style="font-size:20px">'.$row9['pp'].'</td>
          </tr>';
          }
          echo '</table>';
          echo '</div>
          </div>';
          echo '<form action="homepage.php">';
          echo '<p align="center"><button  class="button" ><span>Previous </span></button></p>';
          echo '</form>';
    }else{
      echo 'pokemon disabled by the admin';
    }
  }
  else{
    echo 'search not found';
  }
}
echo '<div class="content" >';
if( isset( $_GET['pid'])){
//select * from pokemon
$poid = $_GET['pid'];
$query= "SELECT * FROM pokemon WHERE pokeid='$poid'";
$sql=mysqli_query($db,$query);
$row = mysqli_fetch_assoc($sql);
//select type 1 name
$query2="SELECT tname FROM type WHERE typeid=(SELECT type1id FROM pokemon WHERE pokeid='$poid')";
$sql2=mysqli_query($db,$query2);
$row2=mysqli_fetch_assoc($sql2);
//select type 2 name
$query3="SELECT tname FROM type WHERE typeid=(SELECT type2id FROM pokemon WHERE pokeid='$poid')";
$sql3=mysqli_query($db,$query3);
$row3=mysqli_fetch_assoc($sql3);
//select * from stats stats
$query4="SELECT * FROM STATS WHERE pokeid='$poid'";
$sql4=mysqli_query($db,$query4);
$row4=mysqli_fetch_assoc($sql4);
//select region name
$query5="SELECT regionname from gen WHERE genid='$row[genid]'";
$sql5=mysqli_query($db,$query5);
$row5=mysqli_fetch_assoc($sql5);
echo '<img src="img/pokemon/'.$row['pokeid'].'.png" alt="image" class="center" width=50 height=500>';
echo '<h2 align="center">';
echo strtoupper($row['pokename']);
echo '</h2>';
echo '<h3 style="font-size:25px">Profile</h3>';
echo '<div class="container">
<div class="floatLeft">
<table>
<tr><td style="font-size:20px" width=50%>Pokemon Id</td> <td style="font-size:20px">: #'.$row['pokeid'].'</td></tr>
<tr><td style="font-size:20px" width=50%>height</td> <td  style="font-size:20px">: '.$row['height'].'</td></tr>
<tr><td style="font-size:20px" width=50%>Weight</td> <td  style="font-size:20px">: '.$row['weight'].'</td></tr>
</table>
</div>
<div class="floatRight">
<table>
<tr><td style="font-size:20px" width=50%>Generation </td> <td  style="font-size:20px">: '.$row['genid'].'</td></tr>
<tr><td style="font-size:20px" width=50%>Region</td> <td  style="font-size:20px">: '.$row5['regionname'].'</td></tr>
<tr><td style="font-size:20px" width=50%>Category</td> <td  style="font-size:20px">: '.$row['category'].'</td></tr>
</table>
</div>
</div>';
echo '<h3  style="font-size:25px">Type</h3>
<table>
<tr><td style="font-size:20px" width=50%>Type1</td> <td style="font-size:20px">:  '.$row2['tname'].'</td></tr>
<tr>';
if($row3>0){
echo '<td style="font-size:20px" width=50%>Type2</td> <td  style="font-size:20px">:  '.$row3['tname'].'</td>';
}
else{
  echo '<td style="font-size:20px" width=50%>Type2</td><td style="font-size:20px">:  NIL</td>';
}
echo '</tr>
</table>';


//select type stats
$query11="SELECT tname FROM `type` WHERE typeid in
(select strongtypeid from strongagainsttype where typeid in(select type1id from pokemon where pokeid='$poid'))";
$sql11=mysqli_query($db,$query11);
$query12="SELECT tname FROM `type` WHERE typeid in
(select strongtypeid from strongagainsttype where typeid in (select type2id from pokemon where pokeid='$poid'  or  not type1id))";
$sql12=mysqli_query($db,$query12);
$query13="SELECT tname FROM `type` WHERE typeid in
(select weaktypeid from weakagainsttype where typeid in(select type1id from pokemon where pokeid='$poid'))";
$sql13=mysqli_query($db,$query13);
echo '<h3  style="font-size:25px">Type Stats</h3>';
echo '<table>
<tr>
<td style="font-size:20px" width=50%>Strong Against </td>';
while ($row11=mysqli_fetch_assoc($sql11) ){
echo '<td style="font-size:20px ">   '.$row11['tname'].'</td>';
}
while ($row12=mysqli_fetch_assoc($sql12) ){
echo '<td style="font-size:20px ">   '.$row12['tname'].'</td>';
}
echo '</tr>
<td style="font-size:20px" width=50%>Weak Against</td>';
while ($row13=mysqli_fetch_assoc($sql13) ){
echo '<td style="font-size:20px ">   '.$row13['tname'].'</td>';
}
echo '</tr>
</table>';

echo '<h3  style="font-size:25px">Stats</h3>
<div class="container">
<div class="floatLeft">
<table>
<tr><td style="font-size:20px" width=50%>HP</td> <td style="font-size:20px">: '.$row4['hp'].'</td></tr>
<tr><td style="font-size:20px" width=50%>Attack</td> <td  style="font-size:20px">: '.$row4['attack'].'</td></tr>
<tr><td style="font-size:20px" width=50%>Defense</td> <td  style="font-size:20px">: '.$row4['defence'].'</td></tr>
</table>
</div>
<div class="floatRight">
<table>
<tr><td style="font-size:20px" width=60%>Special Attack</td> <td style="font-size:20px">: '.$row4['spattack'].'</td></tr>
<tr><td style="font-size:20px" width=60%>Special Defense</td> <td  style="font-size:20px">: '.$row4['spdefence'].'</td></tr>
<tr><td style="font-size:20px" width=60%>Speed</td> <td  style="font-size:20px">:'.$row4['speed'].'</td></tr>
</table>
</div>
</div>';


echo '<h3  style="font-size:25px">Evolution</h3>';
//display evolution images
$q8="SELECT * FROM evolvechain WHERE s1id='$poid'  OR s2id='$poid' OR s3id='$poid'";
$query8=mysqli_query($db,$q8);
$row8=mysqli_fetch_assoc($query8);
$q14="SELECT s1evllvl FROM evolvechain WHERE s1id='$poid' OR s2id='$poid' OR s3id='$poid'";
$query14=mysqli_query($db,$q14);
$row14=mysqli_fetch_assoc($query14);
$q15="SELECT s2evllvl FROM evolvechain WHERE s1id='$poid' OR s2id='$poid' OR s3id='$poid'";
$query15=mysqli_query($db,$q15);
$row15=mysqli_fetch_assoc($query15);
if($row8>0){
echo '<table>';
echo '<tr>';
echo'<td><img src="img/pokemon/'.$row8['s1id'].'.png" alt="image" width=150 height=150></td>';
echo '<td style="font-size:20px" width=50%>'.$row14['s1evllvl'].'</td>';
echo '<td><img src="img/pokemon/'.$row8['s2id'].'.png" alt="image" width=150 height=150></td>';
echo '<td style="font-size:20px" width=50%>'.$row15['s2evllvl'].'</td>';
echo '<td><img src="img/pokemon/'.$row8['s3id'].'.png" alt="image"  width=150 height=150></td>';
echo '</tr>';
echo '</table>';
}
else{
  echo'N/A';
}


echo '<h3  style="font-size:25px">Moves</h3>
<div class="container">
<div class="floatLeft">';
//display move details
$query6="SELECT * FROM move WHERE mtypeid in(select type1id from pokemon where pokeid='$poid')";
$sql6=mysqli_query($db,$query6);
$query9="SELECT * FROM move WHERE mtypeid in(select type2id from pokemon where pokeid='$poid')";
$sql9=mysqli_query($db,$query9);
echo '<table>
<tr><td style="font-size:20px" width=50%>Move name</td>
<td style="font-size:20px" width=50%>Move Type</td>
<td style="font-size:20px" width=50%>Power</td>
<td style="font-size:20px" width=50%>Accuracy</td>
<td style="font-size:20px" width=50%>PP</td>
</tr>';
while ($row6=mysqli_fetch_assoc($sql6) ){
  //display move type name
  $query7="SELECT tname FROM type WHERE typeid =(SELECT mtypeid from move where mid=$row6[mid])";
  $sql7=mysqli_query($db,$query7);
  $row7=mysqli_fetch_assoc($sql7);
echo '<tr>
<td style="font-size:20px">'.$row6['mname'].'</td>
<td style="font-size:20px">'.$row7['tname'].'</td>
<td  style="font-size:20px">'.$row6['power'].'</td>
<td  style="font-size:20px">'.$row6['accuracy'].'</td>
<td style="font-size:20px">'.$row6['pp'].'</td>
</tr>';
}
while ($row9=mysqli_fetch_assoc($sql9) ){
  //display move type name
  $query10="SELECT tname FROM type WHERE typeid =(SELECT mtypeid from move where mid=$row9[mid])";
  $sql10=mysqli_query($db,$query10);
  $row10=mysqli_fetch_assoc($sql10);
echo '<tr>
<td style="font-size:20px">'.$row9['mname'].'</td>
<td style="font-size:20px">'.$row10['tname'].'</td>
<td  style="font-size:20px">'.$row9['power'].'</td>
<td  style="font-size:20px">'.$row9['accuracy'].'</td>
<td style="font-size:20px">'.$row9['pp'].'</td>
</tr>';
}
echo '</table>';
echo '</div>
</div>';


echo '<form action="homepage.php">';
echo '<p align="center"><button  class="button" ><span>Previous </span></button></p>';
echo '</form>';
 }
?>
</div>
    </div>
    </div>
    </form>
  </body>
</html>
