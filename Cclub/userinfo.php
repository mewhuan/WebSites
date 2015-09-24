<!DOCTYPE html>
<html lang="en" class="app">
<?php include "connect.php";?>
<head>  
  <meta charset="utf-8" />
  <title>Cclub | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info nav-xs">

        <a href="index.php" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">Cclub</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      
       <form action="search.php" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" >
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" name="content" class="form-control input-sm no-border rounded" placeholder="Search concerts, artists...">
          </div>
        </div>
      </form>
    
<!--b:log in-->
      <?php
      if(isset($_GET['user'])){
      ?>
      <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <?php 
                 $username = $_GET['user'];
                 $username1 = $_SESSION['username'];
				 $stmt = $mysqli->prepare("select image from users where username='$username1'");
                            $stmt->execute();
							$stmt->bind_result($img);
                            if($stmt->fetch()){
                             echo '<img src="'.$img.'" class="img-circle">';
                           }
                            else{
                              echo '<img src="./images/def.png" class="img-circle">';
                            }
                           $stmt->close();
                            ?>
              </span><?php echo $_SESSION['name'];?> 
             <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight"> 
            <li>
                <a href="account.php">Account</a>
              </li>           
              <li>
                <a href="docs.html">Help</a>
              </li>
              <li class="divider"></li>
              <!-- <li>
                <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
              </li> -->
              <li>
                <a href="logout.php">Log out</a>
              </li>
            </ul>
          </li>
        </ul>
      <?php
      }
      else{
      ?>
      <div class="navbar-right">
        <ul id="menu">
          <li><a href="signin.php">Sign in</a></li>
          <li><a href="signup.php"><font color="red">Sign up</font></a></li>
        </ul>
      </div>
      <?php } ?>
<!--e:log in-->

    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk nav-xs aside hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                   <ul class="nav" data-ride="collapse">
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                        <i class="icon-screen-desktop icon">
                        </i>
                        <span>What'new</span>
                      </a>
                      <ul class="nav dk text-sm">
                        <li >
                          <a href="main.php" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Artist liked</span>
                          </a>
                        </li>
                        <li >
                          <a href="main_rec.php" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>User recomend</span>
                          </a>
                        </li>
                        <li >
                          <a href="main_followee.php" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>User followed</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="nav bg clearfix">                    
                    <li>
                      <a href="blog.php">
                        <i class="icon-disc icon text-success"></i>
                        <span class="font-bold">My Activity</span>
                      </a>
                    </li>
                    <li>
                      <a href="mylist.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">My List</span>
                      </a>
                    </li>
                    <li>
                      <a href="account.php">
                        <i class="icon-list icon  text-info-dker"></i>
                        <span class="font-bold">Account</span>
                      </a>
                    </li>
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class="text-center m-b m-t">
                          <a href="#" class="thumb-lg">
                            <?php 
                            $username =$_GET['user'];
                            $stmt = $mysqli->prepare("select image from users where username='$username'");
                            $stmt->execute();
                            $stmt->bind_result($img);
                            if($stmt->fetch()){
                              if(empty($img)){ 
                                echo '<img src="./images/def.png" class="img-circle">';
                              }
                              else{  
                              echo '<img src="'.$img.'" class="img-circle">';
                              }
                            }
							$stmt->close();
                            ?>
                          </a>
                          <div>
                            <div class="h3 m-t-xs m-b-xs"><?php 
							if ($stmt = $mysqli->prepare("select namess from users where username=?")) {
									$stmt->bind_param("s",$_GET["user"]);//get the username from outside.
									$stmt->execute();
									$stmt->bind_result($name);
									$stmt->fetch();
									echo "$name";
									$stmt->close();}						?></div>
                          </div>                
                        </div>
                        <div class="panel wrapper">
                          <div class="row text-center">
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block"><?php if ($stmt = $mysqli->prepare("select count(follower) from follow where followee=?")) {
																				$stmt->bind_param("s", $_GET["user"]);
																				$stmt->execute();
																				$stmt->bind_result($followers);
																				$stmt->fetch();
																				echo "$followers";
																				$stmt->close();}
																				?></span>
                                <small class="text-muted">Followers</small>
                              </a>
                            </div>
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">
								<?php if ($stmt = $mysqli->prepare("select count(followee) from follow where follower=?")) {
																				$stmt->bind_param("s", $_GET["user"]);
																				$stmt->execute();
																				$stmt->bind_result($followees);
																				$stmt->fetch();
																				echo "$followees";
																				$stmt->close();}
																				?></span>
                                <small class="text-muted">Following</small>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="btn-group btn-group-justified m-b">
						 <?php 
                       echo'   <a class="btn btn-success btn-rounded" data-toggle="button" onclick=window.location.href="userinfo_follow.php?user1='.$_SESSION['username'].'&user2='.$_GET['user'].'">';
           						 
						  if ($stmt = $mysqli->prepare("select followee from follow where follower=? and followee=?")) {
                                   $stmt->bind_param("ss",$_SESSION['username'], $_GET['user']);
                                   $stmt->execute();
                                   $stmt->bind_result($current_follow);
                                  if ($stmt->fetch()) {
                                     echo'
							<span class="text"> <i class="fa fa-eye"></i>Following
                            </span>
							<span class="text-active"> <i class="fa fa-eye"></i>Follow
                            </span>
';
                                                  }
                           else {
                       echo ' <span class="text">
                              <i class="fa fa-eye"></i> Follow
                            </span><span class="text-active"> <i class="fa fa-eye"></i>Following
                            </span>
                            ';
                                      }
  $stmt->close();
}
                              
                       echo'   </a>';?>
                          
                        </div>
                        <div>
                          <small class="text-uc text-xs text-muted">about me</small>
                          <p><?php if ($stmt = $mysqli->prepare("select username  from artist where username=?")) {
											$stmt->bind_param("s", $_GET['user']);
											$stmt->execute();
											$stmt->bind_result($username);
											if ($stmt->fetch()) {	$stmt->close();										
											echo'Artist';
											 if ($stmt = $mysqli->prepare("select identity  from artist where username=?"))
											 { $stmt->bind_param("s", $_GET['user']);
											   $stmt->execute();
											   $stmt->bind_result($identity);
											   $stmt->fetch();
											   if ($identity=='Yes')
											   {  echo'<font color="green"> Identified </font>';}
											   else { echo'<font color="orange"> Not Identified </font>';}
										 
											 }
														}
													else {	$stmt->close();
													echo'Normal User';
								}
										
										
                      }?></p>
                          
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light lt">
                      <ul class="nav nav-tabs nav-white">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
 
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                         <div class="container">
                            <div class="col-md-12"> 
							  <div class="col-md-12">	
                				<h3>Here Is The User's Current Info:</h3>	
                                 <?php   
							   include "connect.php";
								 if ($stmt = $mysqli->prepare("select namess,dob,email,city from users where username=?")) {

									$stmt->bind_param("s",$_GET['user']);
									$stmt->execute();
									$stmt->bind_result($name,$birth,$email,$city);
									$stmt->fetch();
  
									echo '<table>';
									echo "<tr><td>Name:</td><td>$name</td></tr>";
									echo "<tr><td>Birth:</td><td>$birth</td></tr>";
									echo "<tr><td>Email:</td><td>$email</td></tr>";
									echo "<tr><td>City:</td><td>$city</td></tr>";
								 echo '</table>';  
                                 $stmt->close();}  
                                if ($stmt = $mysqli->prepare("select hyperlink,description from artist where username=?")) {
									$stmt->bind_param("s",$_GET['user']);
									$stmt->execute();
									$stmt->bind_result($hyperlink,$description);
									$stmt->fetch();
									echo '<table>';
									echo "<tr><td>Hyperlink:</td><td>$hyperlink</td></tr>";
									echo "<tr><td>Description:</td><td>$description</td></tr>";
								 echo '</table>';  
                                 $stmt->close();}							 ?>
                              <h3>The User Likes:</h3>
							                                   <?php if($stmt=$mysqli->prepare("select subtype from user_like where username=?")){
   $stmt->bind_param("s",$_GET["user"]);
   $stmt->execute();
   $stmt->bind_result($types);
   echo '<div class="tags m-b-lg l-h-2x">';
   while ($stmt->fetch())
   {
      $newtype=str_replace(" ","%20",$types);
   echo' <a href="#" class="label bg-primary" >';
   echo "<font color='white'>$types</font></a>";
   }
   echo '</div>';
   if(empty($types)){ echo '<small>This user has no liked types</small>';}//if no types liked now.
   $stmt->close();
}
						?>
				<h3>The User Plays:</h3>
<?php  if($stmt=$mysqli->prepare("select subtype from artist_play where username=?")){
   $stmt->bind_param("s",$_GET["user"]);
   $stmt->execute();
   $stmt->bind_result($atypes);
  echo '<div class="tags m-b-lg l-h-2x">';
   while ($stmt->fetch())
   {
      $anewtype=str_replace(" ","%20",$atypes);
   echo' <a href="#" class="label bg-primary" >';
   echo "<font color='white'>$atypes</font></a>";
   }
   echo '</div>';
   if(empty($atypes)){ echo '<small>This user has no play types</small>';}//
   $stmt->close();
} ?>
							  						 
							  </div>
                                                           
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                
                
        </section>
        <footer id="footer">
                  <div class="text-center padder">
                    <p>
                      <small>Copyright @Cclub @Dong Li @Dawei Yuan all rights reserved<br>&copy; 2014</small>
                    </p>
                  </div>
                </footer>
      </section>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
  <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/demo.js"></script>

</body>
</html>









