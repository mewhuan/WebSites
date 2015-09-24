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
        $username = $_SESSION['username'];
        $now =date("Y-m-d H:i:s");
          if(isset($_GET['cid'])&&isset($_GET['rates'])&&isset($_GET['comments'])){
            $cid = $_GET['cid'];
            $rates = $_GET['rates'];
            $comments = $_GET['comments'];
            $stmt = $mysqli->prepare("insert into comments values('$username','$rates','$cid','$comments','$now')");
              $stmt->execute();
              $stmt->close();
			  
          }
		  if($stmt=$mysqli->prepare("select trustscore from users where username=?")){
   $stmt->bind_param("s",$_SESSION['username']);
   $stmt->execute();
   $stmt->bind_result($score);
   $stmt->fetch();
   $stmt->close();
}
if (empty($score)) {$score=0;}
else {$score+=1;}

if($stmt=$mysqli->prepare("update users set trustscore=? where username=?")){
   $stmt->bind_param("is",$score,$_SESSION['username']);
   $stmt->execute();
   $stmt->close();
}
      ?>
      <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <?php 
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
                  <?php 
                  $cid = $_GET['cid'];
                  $stmt = $mysqli->prepare("select u1.username,u2.username,u1.namess,u2.namess,c.image,c.cid,cname,t.type,ctime,
                  l.vname,v.city,price from concert c,concert_type ct,type t,users u1,users u2,located l,venue v
                  where c.cid='$cid' and c.cid=ct.cid and ct.ctype=t.subtype and poster=u1.username and actor=u2.username
                  and l.cid=c.cid and l.vname=v.vname");
                            
                  $stmt->execute();
                  $stmt->bind_result($postuser,$actuser,$poster,$actor,$cimage,$cid,$cname,$type,$ctime,$vname,$city,$price);
                  if($stmt->fetch()){
                  ?>
                  <h2 class="font-thin m-b">Concert <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                  <div style="height:230px;width=:100px">
                  <h3>
                    <!-- <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border"> -->
                    <?php if(empty($cimage)){
                      echo '<div width="160px" height="210px" style="margin-left:50px;float:left"><img src="./images/p1.jpg" width="150px" height="200px"></div>';
                    }
                    else{
                      echo '<div width="160px" height="210px" style="margin-left:50px;float:left"><img src="'.$cimage.'" width="150px" height="200px"></div>';
                    }
                    
                    echo '<div style="margin-left:50px;float:left" height="210px"><font color="#8600FF" size="5">'.$cname.'</font><br>';
                    echo '<font color="#8600FF" size="3" onclick=window.location.href="userinfo.php?user='.$actuser.'">By '.$actor.'</font><br>';
                    echo '<font color="red" size="2" onclick=window.location.href="userinfo.php?user='.$postuser.'">Post by: '.$poster.'</font><br>';
                    echo '<font color="grey" size="2">Type: '.$type.'</font><br>';
                    echo '<font color="grey" size="2">Location: '.$vname.'</font><br>';
                    echo '<font color="grey" size="2">City: '.$city.'</font><br>';
                    echo '<font color="grey" size="2">Open time: '.$ctime.'</font><br>';
                    echo '<font color="grey" size="2">Price: '.$price.' dollars</font><br></div>';

                    }
                    $stmt->close();
                    ?>
                    <!-- </ul> -->
                  </h3>
                </div>
                <br>
                <div>
                <section class="scrollable">
                  <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                  <?php
                    $stmt = $mysqli->prepare("select username,namess,rating,review,timediff(now(),ratetime),image from users natural join comments where cid='$cid'");
                    $stmt->execute();
                    $stmt->bind_result($user,$name,$rating,$review,$time,$uimage);
                    while($stmt->fetch()){ 
                      ?>
                    <li class="list-group-item">
                      <a href="#" class="thumb-sm pull-left m-r-sm">
                        <?php 
                          if(empty($uimage)){
                            echo '<img src="./images/def.png" class="img-circle" onclick=window.location.href="userinfo.php?user='.$user.'">'; 
                          }
                          else{
                            echo '<img src="'.$uimage.'" class="img-circle" onclick=window.location.href="userinfo.php?user='.$user.'">'; 
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
                          echo '<strong class="block">'.$name.'</strong>';
                          echo '<font color="grey" size="2">Rating: '.$rating.'</font><br>';
                          echo '<font color="grey" size="2">Review: '.$review.'</font><br>';
                        ?>
                      </a>
                  </li>
                  <?php }; ?>
                  <li class="list-group-item">
                      <a href="#" class="thumb-sm pull-left m-r-sm">
                        <?php 
                          if(empty($img)){
                            echo '<img src="./images/def.png" class="img-circle">'; 
                          }
                          else{
                            echo '<img src="'.$img.'" class="img-circle">'; 
                          }
                        ?>
                      </a>
                      <a href="#" class="clear">
                        <?php echo '<strong class="block">'.$_SESSION['name'].'</strong>';?>
                  <form method="get" action="concertinfo.php">
                    <div class="form-group pull-in clearfix">
                      <div class="col-sm-6">
                        <label >Rating</label>
                        <input type="text" class="form-control" name="rates" placeholder="Enter Rating: 1~10">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Comment</label>
                      <textarea class="form-control" rows="5" name="comments" placeholder="Type your comment"></textarea>
                    </div>
                    <input type="hidden" value="<?php echo $cid;?>" name="cid">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Submit comment</button>
                    </div>
                  </form>
                </a>
              </li>
                  </ul>
                </section>
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