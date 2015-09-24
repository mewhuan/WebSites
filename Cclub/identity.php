<?php
include "connect.php";
if ($stmt = $mysqli->prepare("select identity from artist where username=?")) {
  $stmt->bind_param("s", $_SESSION['username']);
  $stmt->execute();
  $stmt->bind_result($identity);
  if ($stmt->fetch()) {
    echo'Artist';
	 if ($identity=='Yes')
		{  echo'<font color="green"> Identified </font>';}
	    else { echo'<font color="orange"> Not Identified </font>';}
  }
  else {
    echo'Normal User';
  }
  $stmt->close();
  $mysqli->close();
}
?>