<?php
include "connect.php";
$user=$_GET['user2'];
date_default_timezone_set("America/New_York");							    
$date_t=date("Y-m-d H:i:s");
if($stmt=$mysqli->prepare("select follower,followee from follow where follower=? and followee=?")){
                         $stmt->bind_param("ss",$_GET['user1'], $_GET['user2']);
                         $stmt->execute();
                         $stmt->bind_result($current_follower,$current_followee);
						 if($stmt->fetch())
						 {
						 $stmt->close();
                         if ($stmt= $mysqli->prepare("delete from follow where follower=? and followee=?")){ 
	                     $stmt->bind_param("ss",$current_follower,$current_followee);                                                          
		                 $stmt->execute();                                                                                                                              
                         $stmt->close();					 
						 }
						 }
						 else						 
						 {
						  $stmt->close();
                         if ($stmt= $mysqli->prepare("insert into follow (follower,followee,followtime) values (?,?,?)")){ 
	                     $stmt->bind_param("sss",$_GET['user1'],$_GET['user2'],$date_t);                                                          
		                 $stmt->execute();                                                                                                                              
                         $stmt->close();
						 						 
						 }

                       }
			}
                       $mysqli->close();
                       header("refresh: 0; userinfo.php?user=$user");
?>