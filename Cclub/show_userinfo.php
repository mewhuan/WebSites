<?php
include 'connect.php';
if ($stmt = $mysqli->prepare("select namess,dob,email,city from users where username=?")) {
  $stmt->bind_param("s",$_SESSION['username']);
  $stmt->execute();
  $stmt->bind_result($name, $birth,$email,$city);
  $stmt->fetch();
  
  echo '<table>';
  echo "<tr><td>Name:</td><td>$name</td></tr>";
  echo "<tr><td>Birth:</td><td>$birth</td></tr>";
  echo "<tr><td>Email:</td><td>$email</td></tr>";
  echo "<tr><td>City:</td><td>$city</td></tr>";
  echo '</table>';
  
  $stmt->close();
  $mysqli->close();
}

?>