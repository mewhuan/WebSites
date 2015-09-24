<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <?php include "connect.php"; ?>
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
<body class="bg-info dker">
  <?php
  if(isset($_SESSION['username'])){
  echo "You are already logged in, redirecting in 3 seconds.";
  header("refresh: 3; index.php");
}
else{
  if(isset($_GET['username'])&&isset($_GET['password'])){
    if($stmt = $mysqli->prepare("select username, passwords, namess from users where username=? and passwords=?")){
      $stmt->bind_param("ss", $_GET['username'] ,$_GET['password']);
      $stmt->execute();
      $stmt->bind_result($username, $password, $name);
      if($stmt->fetch()){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['name'] = $name;
        $_SESSINO['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
        echo "Login Successful.<br>";
        header("refresh: 1; index.php");
      }
      else{
        sleep(1);
        echo "Your username or password is incorrect. Please try again.";
        header("refresh: 3; signin.php");
      }
      $stmt->close();
      $mysqli->close();
    }
  }
  else{
    ?>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.php"><span class="h1 font-bold"><font color="#8600FF">Cclub</font></span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong><font color="#8600FF">Sign in to get in touch</font></strong>
        </header>
        <form action="signin.php" method="get">
          <div class="form-group">
            <input type="text" placeholder="Username" name="username" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
             <input type="password" placeholder="Password" name="password" class="form-control rounded input-lg text-center no-border">
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign in</span></button>
          <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="signup.php" class="btn btn-lg btn-info btn-block rounded">Create an account</a>
        </form>
      </section>
    </div>
  </section>
  <?php } } ?>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Copyright @Cclub @Dong Li @Dawei Yuan all rights reserved<br>&copy; 2014</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
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