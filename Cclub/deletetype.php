<?php
include "connect.php";
$type=$_GET['type'];
$username = $_SESSION['username'];
if ($stmt = $mysqli->prepare("delete from user_like where username=? and subtype=?")) {
              $stmt->bind_param("ss",$username,$type);
              $stmt->execute();
              $stmt->close();			  
			  }
$mysqli->close();
$back = $_SERVER["HTTP_REFERER"];
		header("refresh: 0; '$back'");
?>