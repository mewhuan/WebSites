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
      $stmt->close();
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
                 <div style="width:100%;float:left;">
                

                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" ><i class="icon-refresh i-lg  inline" id="refresh"></i></a>
                  <h2 class="font-thin m-b">Upcoming Concert <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                  <?php 
                    $stmt = $mysqli->prepare("select c.cid,c.cname, c.ctime, c.price, c.image, u.namess,u.username from users u, concert c where u.username=c.actor and c.ctime>now() order by c.ctime");
                    $stmt->execute();
                    $stmt->bind_result($cid,$cname,$ctime,$price,$image,$namess,$user);
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
                          <a href="#" onclick=window.location.href="concertinfo.php?cid=<?php echo $cid;?>" class="text-ellipsis"><?php echo $cname; ?></a>
                          <a href="#" onclick=window.location.href="userinfo.php?user=<?php echo $user;?>" class="text-ellipsis text-xs text-muted"><?php echo $namess; ?></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $price; ?> <font color="red">dollars</font></a>
                          <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $ctime; ?></a>
                        </div>
                      </div>
                    </div>
                    <?php } }
                    $stmt->close(); ?>
                  
                </div>
                  <div class="row">
                    <div class="col-md-7">
                      <h3 class="font-thin">Active User</h3>
                      <div class="row row-sm">
                        <?php
                        $stmt = $mysqli->prepare("select count(*),poster,namess,u.image from concert,users u where username=poster group by poster order by count(*) desc");
                        $stmt->execute();
                        $stmt->bind_result($num,$postuser,$poster,$postimg);
                        $count = 0;
                        while($stmt->fetch()){
                          $count = $count + 1;
                        ?>
                        <div class="col-xs-6 col-sm-3">
                          <div class="item">
                            <div class="pos-rlt">
                              <?php 
                              if($count<9){
                              if(empty($postimg)){ ?>
                              <img onclick=window.location.href="userinfo.php?user=<?php echo $postuser;?>" src="./images/def.png" alt="" class="r r-2x img-full">
                              <?php
                              }else{ ?>
                              <img onclick=window.location.href="userinfo.php?user=<?php echo $postuser;?>" src="<?php echo $postimg;?>" alt="" class="r r-2x img-full">
                              <?php } ?>
                            </div>
                            <div class="padder-v">
                              <a href="#" onclick=window.location.href="userinfo.php?user=<?php echo $postuser;?>" class="text-ellipsis"><?php echo $poster;?></a>
                              <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $num;?></a>
                            </div>
                          </div>
                        </div>
                        <?php } } 
                        $stmt->close();
                        ?>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <h3 class="font-thin">Top Artist</h3>
                      <div class="list-group bg-white list-group-lg no-bg auto"> 
                        <?php 
                        $stmt = $mysqli->prepare("select cid,cname,avg(rating),actor,u.namess,u.image from users u,concert natural join comments where actor=u.username group by cid order by avg(rating) desc");
                        $stmt->execute();
                        $stmt->bind_result($id,$coname,$avg,$actuser,$actor,$immg);
                        $ccoun = 0;
                        while($stmt->fetch()){
                          $ccoun = $ccoun + 1;
                          if($ccoun<6){
                        ?>                       
                        <a href="#" class="list-group-item clearfix">
                          <span class="pull-right h2 text-muted m-l"><?php echo $avg;?></span>
                          <span class="pull-left thumb-sm avatar m-r">
                            <?php if(empty($immg)){
                            echo '<img onclick=window.location.href="userinfo.php?user='.$actuser.'" src="images/def.png" alt="...">';
                          }
                          else{
                            echo '<img onclick=window.location.href="userinfo.php?user='.$actuser.'" src="'.$immg.'" alt="...">';
                          }?>
                          </span>
                          <span class="clear">
                            <span onclick=window.location.href="concertinfo.php?cid=<?php echo $id;?>"><?php echo $coname;?></span>
                            <small class="text-muted clear text-ellipsis">by <?php echo $actor;?></small>
                          </span>
                        </a>
                       <?php }}
                       $stmt->close();?>
                      </div>
                    </div>
                  </div></section>
                  
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