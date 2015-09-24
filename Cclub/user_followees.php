<?php 
include "connect.php";

if ($stmt = $mysqli->prepare("select count(followee) from follow where follower=?")) {
  $stmt->bind_param("s", $_SESSION["username"]);
  $stmt->execute();
  $stmt->bind_result($sum);
  $stmt->fetch();
  echo "$sum";
  $stmt->close();}
  $mysqli->close();

?>