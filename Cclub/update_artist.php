<?php
include 'connect.php';



  if ($stmt = $mysqli->prepare("select username,identity,hyperlink,description from artist where username=?")) {
    $stmt->bind_param("s",$_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($username, $identity,$hyperlink,$description);
    if ($stmt->fetch()){
     $stmt->close();
    if ($stmt = $mysqli->prepare("update artist set hyperlink=?,description=? where username=?")){
	    $stmt->bind_param("sss",$_POST['link'],$_POST['message'],$_SESSION['username']);
		$stmt->execute();
		$stmt->close();
		header("refresh: 0; account.php");
	}
      
  } 
  else {
  $stmt->close(); 
     if ($stmt = $mysqli->prepare("insert into artist (username, hyperlink,description) values (?,?,?)")){
	    $stmt->bind_param("sss",$_SESSION['username'],$_POST['link'],$_POST['message']);
		$stmt->execute();
		$stmt->close();
       header("refresh: 0; account.php");}
 }
  }
 


 $mysqli->close();

?>