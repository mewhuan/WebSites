<?php
include "connect.php";
$rname=$_GET['rname'];
$cid=$_GET['cid'];
echo $rname;
echo $cid;
$username = $_SESSION['username'];
echo $username;
if ($stmt = $mysqli->prepare("delete from recommendlist where username=? and rname=? and cid=?")) {
              echo "ddsdsds";
              $stmt->bind_param("ssi",$username,$rname,$cid);
              $stmt->execute();
              $stmt->close();			  
			  }
$mysqli->close();
header("refresh: 3; mylist.php");
?>