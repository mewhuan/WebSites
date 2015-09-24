<html>
<title>Logout</title>

<?php
include "connect.php";
session_start();
date_default_timezone_set("America/New_York");							    
$date_t=date("Y-m-d H:i:s");
if($stmt=$mysqli->prepare("select trustscore from users where username=?")){
   $stmt->bind_param("s",$_SESSION['username']);
   $stmt->execute();
   $stmt->bind_result($score);
   $stmt->fetch();
   $stmt->close();
}
if (empty($score)) {$score=1;}
else {$score = $score + 1;}
echo "$score";
echo "$date_t";
if($stmt=$mysqli->prepare("update users set lastlogintime=? ,trustscore=? where username=?")){
   $stmt->bind_param("sis",$date_t,$score,$_SESSION['username']);
   $stmt->execute();
   $stmt->close();
}
$mysqli->close();
session_destroy();
header("refresh: 2; welcome.php");

?>
</html>