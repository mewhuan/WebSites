<?php
include 'connect.php';
   echo'   Welcome!';
if(isset($_SESSION['username'])){
  if ($stmt = $mysqli->prepare("select * from artist where username=?")) {
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($username);
    if ($stmt->fetch()) {
      echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspArtist';
      echo '</br><em class="font-thin small  font-weight ">You may view the concerts listed below,For more Info,Log in OR Register </em> ';
    }
    else {
      echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNormal User';
      echo '</br><em class="font-thin small  font-weight ">You may view the concerts listed below,For more Info,Log in OR Register </em> ';
    }
    $stmt->close();
    
  }
}
else {
  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVisitor';
  echo '</br><em class="font-thin small  font-weight ">You may view the concerts listed below,For more Info,Log in OR Register </em> ';

}
?>