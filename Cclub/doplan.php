<?php
include "connect.php";
$name = $_SESSION['username'];
$cid = $_GET['plan'];
if ($stmt = $mysqli->prepare("select * from plans_attend where username=? and cid=?")){
	    $stmt->bind_param("ss",$name,$cid);
		$stmt->execute();
        if($stmt->fetch()){
            $stmt->close();
            $stmt = $mysqli->prepare("update plans_attend set plan='Yes' where username=? and cid=?");
            $stmt->bind_param("ss",$name,$cid);
            $stmt->execute();
        }
        else{
            $stmt->close();
            $stmt = $mysqli->prepare("insert into plans_attend(username,cid,plan) values(?,?,'Yes')");
            $stmt->bind_param("ss",$name,$cid);
            $stmt->execute();
        }
        $stmt->close();
        $back = $_SERVER["HTTP_REFERER"];
		header("refresh: 0; '$back'");
	}
 $mysqli->close();

?>