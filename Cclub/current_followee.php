<?php
include 'connect.php';

echo '<ul class="list-group">';
if ($stmt = $mysqli->prepare("select followee,namess from follow , users where username=followee and follower=?")) {
      $stmt->bind_param("s", $_SESSION['username']);
      $stmt->execute();
      $stmt->bind_result($followee,$followeename);
	  if($stmt->fetch()){ // if the current user has followee.
	    $mysqli1 = new mysqli("localhost", "root", "524971", "web"); //create a new mysqli object to do the subquery.
        if ($stmt1= $mysqli1->prepare("select artist.username,namess from artist natural join users where artist.username=?")){
          $stmt1->bind_param("s", $followee);
		  $stmt1->execute();
		  $stmt1->bind_result($followa,$followname);
		 if( $stmt1->fetch()){ //if can find followee in the artist table.
		  echo  '<li class="list-group-item">
                      <a href="#">
                        <span class="pull-right"><input type="button" value="UnFollow" onclick="window.location.href=';
		   echo		"'delete_follow.php?followee=";
		   echo  "$followa";
		   echo "'";
		   echo '"></span>';
          echo  '<font color="LimeGreen" onclick=window.location.href="userinfo.php?user='.$followa.'">Artist &nbsp;name: '.$followname.' </font>
                      </a>
                    </li>';
          $stmt1->close();}
		  else {//else the followee is the normal user
		  
		   echo  '<li class="list-group-item">
                      <a href="#">
                        <span class="pull-right"><input type="button" value="UnFollow" onclick="window.location.href=';
		   echo		"'delete_follow.php?followee=";
		   echo  "$followee";
		   echo "'";
		   echo '"></span>';
          echo    '<font color="LightSkyBlue" onclick=window.location.href="userinfo.php?user='.$followee.'"> Normal User &nbsp;name: '.$followeename.'</font>
                      </a>
                    </li>';
          $stmt1->close();		  	  		  
		  }  
	  }
	  while ($stmt->fetch()){//while the current has another followee.
	 if ($stmt1= $mysqli1->prepare("select artist.username,namess from artist natural join users where artist.username=?")){
          $stmt1->bind_param("s", $followee);
		  $stmt1->execute();
		  $stmt1->bind_result($followa,$followname);
		 if( $stmt1->fetch()){ //if can find followee in the artist table.
		  echo  '<li class="list-group-item">
                      <a href="#">
                        <span class="pull-right"><input type="button" value="UnFollow" onclick="window.location.href=';
		   echo		"'delete_follow.php?followee=";
		   echo  "$followa";
		   echo "'";
		   echo '"></span>';
          echo    '<font color="LimeGreen" onclick=window.location.href="userinfo.php?user='.$followa.'">Artist &nbsp;name: '.$followname.' </font>
                      </a>
                    </li>';
          $stmt1->close();}
		  else {//else the followee is the normal user
		  
		   echo  '<li class="list-group-item">
                      <a href="#">
                        <span class="pull-right"><input type="button" value="UnFollow" onclick="window.location.href=';
		   echo		"'delete_follow.php?followee=";
		   echo  "$followee";
		   echo "'";
		   echo '"></span>';
          echo    '<font color="LightSkyBlue" onclick=window.location.href="userinfo.php?user='.$followee.'">Normal User &nbsp;name: '.$followeename.'</font>
                      </a>
                    </li>';
          $stmt1->close();		  	  		  
		  }  
	  }
	  	    
	  }
	   $mysqli1->close();	   
	  }
	  else {	  
	  echo 'You have no followees,there is some recommendation below';	  
	  }
	  	  
	  $stmt->close();
  
	  }
	  
 $mysqli->close();
echo '</ul>';
?>