<?php
include "connect.php";
$followee=$_GET['followee'];

date_default_timezone_set("America/New_York");							    
$date_t=date("Y-m-d H:i:s");

if ($stmt = $mysqli->prepare("insert into follow (followee,follower,followtime) values (?,?,?)")) {
              $stmt->bind_param("sss",$followee,$_SESSION["username"],$date_t);
              $stmt->execute();
              $stmt->close();			  
			  }
$mysqli->close();
header("refresh: 0; blog.php");
?>