<!DOCTYPE html>
<html lang="en" class="app">
<?php include "connect.php";
date_default_timezone_set('America/New_York'); ?>
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
      if(isset($_SESSION['username'])){
      ?>
      <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <?php 
                  $username = $_SESSION['username'];
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
              </span>
              <?php echo $_SESSION['name'];?> <b class="caret"></b>
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
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" ><i class="icon-refresh i-lg  inline" id="refresh"></i></a>
                  <h2 class="font-thin m-b">Discover <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                  <div STYLE="float:left;width:1100px;height:auto;">
                   <section class="scrollable">
                    
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                            <div STYLE="float:left;width:60%;">
                            <?php 
                            // $stmt = $mysqli->prepare("select c.cid, timediff(now(),posttime) as timed,
                            // cname,ctime,price,u.namess,u2.namess,c.image as cimage,u2.image as uimage 
                            // from users u,concert c,follow,users u2 where u2.username=poster and followee=u.username and actor=followee 
                            // and follower='$username' order by posttime desc");
                            $stmt = $mysqli->prepare("select user1,user2,vname,city,sellinghyperlink,type,t1.cid,timed,cname,ctime,price,name1,name2,cimage,uimage,plan from (select u.username as user1,u2.username as user2,v.vname,v.city,v.sellinghyperlink,ty.type,c.cid, timediff(now(),posttime) as timed,
                            cname,ctime,price,u.namess as name1,u2.namess as name2,c.image as cimage,u2.image as uimage 
                            from concert_type ct,type ty,users u,concert c,users u2,located l,venue v where l.vname=v.vname and l.cid=c.cid and c.cid=ct.cid and ty.subtype=ct.ctype and u2.username=poster and actor=u.username
                            and poster='$username' order by posttime desc) t1 left outer join 
                            (select * from plans_attend where username='$username') t2 on t1.cid=t2.cid");
                            $stmt->execute();
                            $stmt->bind_result($actuser,$postuser,$vname,$city,$sell,$type,$cid,$time,$cname,$ctime,$price,$actor,$poster,$cimage,$uimage,$plan);
                            while($stmt->fetch()){
                              ?>
                            <li class="list-group-item">
                              <a href="#" class="thumb-sm pull-left m-r-sm">
                                <?php 
                                if(empty($uimage)){
                                  echo '<img src="./images/def.png" class="img-circle" onclick=window.location.href="userinfo.php?user='.$postuser.'">'; 
                                }
                                else{
                                  echo '<img src="'.$uimage.'" class="img-circle" onclick=window.location.href="userinfo.php?user='.$postuser.'">'; 
                                }
                                ?>
                              </a>
                              <a href="#" class="clear">
                                <?php $times = explode(":", (string)$time); 
                                  if($times[0]<1){
                                    echo '<small class="pull-right">'.$times[1].' minutes ago</small>';
                                  }
                                  else if($times[0]<24){
                                    echo '<small class="pull-right">'.$times[0].' hours ago</small>';
                                  }
                                  else if($times[0]>=24){
                                    $days = floor(((int)$times[0])/24);
                                    echo '<small class="pull-right">'.$days.' days ago</small>';
                                  }
                                  echo '<strong class="block">'.$poster.'</strong>';
                                  if(empty($cimage)){
                                    echo '<div width="160px" height="210px" style="margin-left:50px;float:left"><img src="./images/p1.jpg" width="150px" height="200px"></div>';
                                  }
                                  else{
                                    echo '<div width="160px" height="210px" style="margin-left:50px;float:left"><img src="'.$cimage.'" width="150px" height="200px"></div>';
                                  }
                                  echo '<div style="margin-left:50px;float:left" height="210px">
                                  <font color="#8600FF" size="5">'.$cname.'</font><br>';
                                  echo '<font color="#8600FF" size="3" onclick=window.location.href="userinfo.php?user='.$actuser.'">By '.$actor.'</font><br>';
                                  echo '<font color="grey" size="2">Type: '.$type.'</font><br>';
                                  echo '<font color="grey" size="2">Location: '.$vname.'</font><br>';
                                  echo '<font color="grey" size="2">City: '.$city.'</font><br>';
                                  echo '<font color="grey" size="2">Open time: '.$ctime.'</font><br>';
                                  echo '<font color="grey" size="2">Price: '.$price.' dollars</font><br>';
                                  echo '<font color="grey" size="2">Buy now: '.$sell.'</font><br><br>';
                                  $now = time();
                                  if($now>strtotime($ctime)){
                                    echo '<font color="orange">Past  </font>';
                                    echo '<font color="red" onclick=window.location.href="concertinfo.php?cid='.$cid.'">|  Comments  |</font>';
                                    echo '<font color="red" onclick=window.location.href="addlist.php?cid='.$cid.'">  Add to my list</font></div>';
                                  }
                                  else if($plan=='Yes'){
                                    echo '<font color="green">Plan'.'✓'.'</font>';
                                    echo '<font color="red" onclick=window.location.href="addlist.php?cid='.$cid.'">  |  Add to my list</font></div>';
                                  }
                                  else{
                                    echo '<form method="post">'; ?>
                                    <input type="button"  value="RSVP" onclick="window.location.href='doplan.php?plan=<?php echo $cid;?>'">
                                    <?php 
                                    echo '<font color="red" onclick=window.location.href="addlist.php?cid='.$cid.'">    Add to my list</font></div>';
                                    echo '</form>';
                                    
                                  }
                                ?>
                                <!-- <small>Wellcome and play this web application template ... </small> -->
                              
                              </a>
                            </li>
                            <?php }
                            $stmt->close(); ?>
                            </div>
                            <div STYLE="width:40%;float:right;" class="col-sm-5">
                              <h5 class="font-bold">Current Followee:</h5>          
                              <?php include "current_followee.php" ;?>
                              <h5 class="font-bold">Recommend of interesting person:</h5>
                              <ul class="list-group">
                              <?php include "recommend_user.php";?>
                              </ul>
                              <?php include "user_likeytpes.php" ?>
                            </div>
                          </ul>
                       
                    </section> </div>
                    <div STYLE="float:left;width:100%;margin-top:10px;">
                                       <h4 class="m-t-lg m-b">Post a new concert!</h4>
                  <form action="insert_concert.php" method="POST">
                    <div class="form-group pull-in clearfix">
                      <div class="col-sm-6">
                        <label>Concert Name:</label>
                        <input type="text" class="form-control" name="cname" placeholder="Concert Name">
                      </div>
                      <div class="col-sm-6">
                        <label >Time:</label>
                        <input type="datetime-local" name="time" class="form-control" placeholder="Time">
                      </div>
                    </div>
					<div class="form-group pull-in clearfix">
                      <div class="col-sm-6">
                        <label>Price:</label>
                        <input type="number" name="price"class="form-control" placeholder="Price">
                      </div>
                      <div class="col-sm-6">
                        <label >Availability:</label></br>
                        <select name="available"><option value="Yes">Yes</option><option value="No">No</option></select>
                      </div>
                    </div>
					<div class="form-group pull-in clearfix">
                      <div class="col-sm-6">
                        <label>Artist:</label></br>
                        <?php include "show_artist_option.php"; ?>
                      </div>
                      <div class="col-sm-6">
                        <label >Location</label></br>
                        <?php include "show_location.php"; ?>
                      </div>
                    </div>
					<div class="form-group pull-in clearfix">
                      <div class="col-sm-6">
                        <label>Concert Type:</label>
                      <?php include "show_types.php"; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Submit Concert</button>
                    </div>
                  </form>
                    </div>
                </section>
                <footer class="footer bg-dark">
                  <div style="text-align:center;width:100%;">
                    <p>
                      <small>Copyright @Cclub @Dong Li @Dawei Yuan all rights reserved<br>&copy; 2014</small>
                    </p>
                  </div>
                </footer>
              </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
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