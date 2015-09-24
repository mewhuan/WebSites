<?php
include "connect.php";
$rname=$_GET['rname'];
$username = $_SESSION['username'];

if ($stmt = $mysqli->prepare("delete from recommendlist where username=? and rname=?")) {
              $stmt->bind_param("ss",$username,$rname);
              $stmt->execute();
              $stmt->close();			  
			  }
			  if ($stmt = $mysqli->prepare("delete from recommend_type where username=? and rname=?")) {
			  $stmt->bind_param("ss",$username,$rname);
              $stmt->execute();
              $stmt->close();			  
			  }

$mysqli->close();
header("refresh: 0; mylist.php");
?>