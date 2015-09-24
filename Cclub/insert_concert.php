<?php
include "connect.php";
if(isset($_POST['cname'])&&isset($_POST['time'])&&isset($_POST['price'])&&isset($_POST['available'])&&isset($_POST['artist'])&&isset($_POST['location'])&&isset($_POST['types']))
{
 if($stmt=$mysqli->prepare("select cname,ctime,vname from concert natural join located where cname=? and ctime=? and vname=?")){//we think there is no 2 concerts with same name,location,time.
       $stmt->bind_param("sss",$_POST['cname'],$_POST['time'],$_POST['location']);
       $stmt->execute();
	   $stmt->bind_result($cname,$ctime,$located);
	   $stmt->fetch();
	   $stmt->close();
 }
 if(empty($cname)){
    if($stmt=$mysqli->prepare("select max(cid) from concert")){//auto set the cid.
       $stmt->execute();
	   $stmt->bind_result($cid);
	   $stmt->fetch();
	   $stmt->close();
 }
    $cid+=1;
	date_default_timezone_set("America/New_York");							    
    $date_t=date("Y-m-d H:i:s");
    if($stmt=$mysqli->prepare("select trustscore from users where username=?")){//test trustscore.
   $stmt->bind_param("s",$_SESSION['username']);
   $stmt->execute();
   $stmt->bind_result($score);
   $stmt->fetch();
   $stmt->close();
}
if($score>=10&&!empty($score)){

   if ($stmt = $mysqli->prepare("insert into concert (cid,cname,ctime,price,availability,actor,poster,posttime) values (?,?,?,?,?,?,?,?)")) {//add concert info
              $stmt->bind_param("ssssssss",$cid,$_POST['cname'],$_POST['time'],$_POST['price'],$_POST['available'],$_POST['artist'],$_SESSION["username"],$date_t);
              $stmt->execute();
              $stmt->close();			  
			  }
   if ($stmt = $mysqli->prepare("insert into concert_type (cid,ctype) values (?,?)")) {//add type info
              $stmt->bind_param("ss",$cid,$_POST['types']);
              $stmt->execute();
              $stmt->close();			  
			  }
	if ($stmt = $mysqli->prepare("insert into located (cid,vname) values (?,?)")) {//add location info
              $stmt->bind_param("ss",$cid,$_POST['location']);
              $stmt->execute();
              $stmt->close();			  
			  }
   
   echo"Update!The page will be directed to your Blog";
   header("refresh: 1; blog.php");}
 else {echo "Update Failed!Your trust score is so low!!";
        header("refresh: 1; blog.php");}
   
 }
 else {
 echo"There is already a concert in the database!The page will be directed to your Blog";
 echo "$cname";
  header("refresh: 1; blog.php");
 }

}


else {
echo 'Please complete your concert information! The page will be directed to your Blog';
           header("refresh: 1; blog.php");
}
?>