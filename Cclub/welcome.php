<!DOCTYPE html>
<html lang="en" class="app">
<?php include "connect.php" ?>
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
    <font size="50%" color="#8600FF">Cclub</font>
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
          <li><a href="signup.php"><font color="red">Join Us</font></a></li>
        </ul>
      </div>
      <?php } ?>
<!--e:log in-->

    </header>
    <section>
      <section class="hbox stretch">
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" ><i class="icon-refresh i-lg  inline" id="refresh"></i></a>
                  <?php 
                    $stmt = $mysqli->prepare("select c.cname, c.ctime, c.price, c.image, u.namess from users u, concert c where u.username=c.actor and c.ctime>now() order by c.ctime");
                    $stmt->execute();
                    $stmt->bind_result($cname,$ctime,$price,$image,$namess);
                    $number = 0;
                    if($stmt->num_rows>0){ ?>
                  <h2 class="font-thin m-b">Upcoming Concert <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                    <?php
                    }
                    else{ ?>
                    <h2 class="font-thin m-b">No upcoming Concert, here are some old concerts <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                    <?php }
                    while($stmt->fetch()){
                      $number = $number + 1;
                      if($number<13){
                      ?>
                  <div class="row row-sm">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <div class="item">
                        <div class="pos-rlt">
                    
                          <?php
                          if(!empty($image)){
                          echo '<img src="'.$image.'"  class="r r-2x img-full">';
                        }
                        else{
                          echo '<img src="./images/p1.jpg"  class="r r-2x img-full">';
                        }
                          ?>
                        </div>
                        <div class="padder-v">
                          <a href="#" class="text-ellipsis"><?php echo $cname; ?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $namess; ?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $price; ?> <font color="red">dollars</font></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $ctime; ?></a>
                        </div>
                      </div>
                    </div>
                    <?php } }
                    if($number==0){
                    $stmt = $mysqli->prepare("select c.cname, c.ctime, c.price, c.image, u.namess from users u, concert c where u.username=c.actor order by c.ctime");
                    $stmt->execute();
                    $stmt->bind_result($cname,$ctime,$price,$image,$namess);
                    $number = 0;
                    while($stmt->fetch()){
                      $number = $number + 1;
                      if($number<13){
                      ?>
                  <div class="row row-sm">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                      <div class="item">
                        <div class="pos-rlt">
                    
                          <?php
                          if(!empty($image)){
                          echo '<img src="'.$image.'"  class="r r-2x img-full">';
                        }
                        else{
                          echo '<img src="./images/p1.jpg"  class="r r-2x img-full">';
                        }
                          ?>
                        </div>
                        <div class="padder-v">
                          <a href="#" class="text-ellipsis"><?php echo $cname; ?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $namess; ?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $price; ?> <font color="red">dollars</font></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $ctime; ?></a>
                        </div>
                      </div>
                    </div>
                    <?php } }
                    }
                    $stmt->close(); ?>
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