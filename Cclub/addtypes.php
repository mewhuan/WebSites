<?php
include 'connect.php';
$types=$_POST['types'];
   if($types!='notype'){
if ($stmt = $mysqli->prepare("insert into user_like (username,subtype) values (?,?)")) {
              $stmt->bind_param("ss",$_SESSION["username"],$types);
              $stmt->execute();
              $stmt->close();			  
			  }
$mysqli->close();}
header("refresh: 0; blog.php");
?>