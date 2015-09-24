<?php
include 'connect.php';   //if the artist plays and also like the same music, it will appears twice.
if($stmt = $mysqli->prepare("select subtype from user_like where username=?")){// 
      $stmt->bind_param("s", $_SESSION['username']);
      $stmt->execute();
      $stmt->bind_result($subtype);
	  if($stmt->fetch()){//if the user has at least music type liked.
	        $mysqli1 = new mysqli("localhost", "root", "524971", "web"); //create a new mysqli object to do the subquery.
        if ($stmt1= $mysqli1->prepare("select distinct u2.username,u2.namess from artist_play,users u2 ,user_like where artist_play.subtype=user_like.subtype 
		and user_like.username=? and artist_play.username=u2.username and u2.username<>? and (u2.username,?) not in (select followee,follower from follow)")){ //select artist which plays the music type is the type of user_like.
	      $stmt1->bind_param("sss",$_SESSION['username'],$_SESSION['username'],$_SESSION['username']);                                                          //if the artist don't play ,then we will treat it as normal user.
		  $stmt1->execute();                                                                                                                              //one can't see himself in the recommend,also can't be the follow relation which already exists, and 
		  $stmt1->bind_result($artistid,$artistname);                                                                                                      //no repetition in artist or users.(like or play)
		  while ($stmt1->fetch()){ //fetch all of the artist who plays the music
		   echo  '<li class="list-group-item">
                      <a href="#">
                        <span class="pull-right"><input type="button" value="Follow" onclick="window.location.href=';
		   echo		"'recommend_follow.php?followee=";
		   echo  "$artistid";
		   echo "'";
		   echo '"></span>';
           echo '<font color="LimeGreen" onclick=window.location.href="userinfo.php?user='.$artistid.'">Artist name: '.$artistname.'  plays: '.$subtype.'</font>
                      </a>
                    </li>';
	  
		  }
		  $stmt1->close();	 
	  }	  
	         $mysqli1->close();
             //output the users who have the same like
		   $mysqli2 = new mysqli("localhost", "root", "524971", "web");
			  if ($stmt2= $mysqli2->prepare("select distinct u2.username,u2.namess from user_like ul1,user_like ul2,users u1,users u2
         where u1.username=? and ul1.username=u1.username and ul1.subtype=ul2.subtype  and ul2.username=u2.username and u2.username<>? and (u2.username,u1.username)not in 
    (select followee,follower from follow)"))
			   {  $stmt2->bind_param("ss",$_SESSION['username'],$_SESSION['username']);
			      $stmt2->execute();
		          $stmt2->bind_result($usern,$unamess);
				  while($stmt2->fetch()){
				   echo  '<li class="list-group-item">
                      <a href="#">
                         <span class="pull-right"><input type="button" value="Follow" onclick="window.location.href=';
		   echo		"'recommend_follow.php?followee=";
		   echo  "$usern";
		   echo "'";
		   echo '"></span>';
                   echo    ' <font color="LightSkyBlue" onclick=window.location.href="userinfo.php?user='.$usern.'"> Normal User name: '.$unamess.'</font>
                      </a>
                      </li>';	 				  
				  }			  
			      $stmt2->close();				   
			   }			      
		    $mysqli2->close();	  		 
			  
	  }	  
	  else //don't have music taste
	  {echo "You don't have music taste,there is some types can be chosen below:";}
	  	  	  
}

$mysqli->close();

?>