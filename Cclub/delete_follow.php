<?php
include "connect.php";
$followee=$_GET['followee'];

if ($stmt = $mysqli->prepare("DELETE FROM follow WHERE followee=? and follower=?")) {
              $stmt->bind_param("ss",$followee,$_SESSION['username']);
              $stmt->execute();
              $stmt->close();			  
			  }
$mysqli->close();
header("refresh: 0; blog.php");
?>