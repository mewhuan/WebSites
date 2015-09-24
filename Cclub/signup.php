<!DOCTYPE html>
<html lang="en" class="app">
<?php include 'connect.php';  ?>
<script language="JavaScript">
function verify(){
  var ps1, ps2;
  ps1 = document.getElementById("ps1").value;
  ps2 = document.getElementById("ps2").value;
  if(ps1.length<8){
    alert("The length of password must be longer than 8!");
    window.location.reload();
    return false;
  }
  else if(!(ps1==ps2&&ps2!="")){
    alert("The password is failed to confirm, please try again!");
    window.location.reload();
    return false;
  }
  var n1,n2,t1,t2;
  n1 = document.getElementById("username").value;
  n2 = document.getElementById("password").value;
  if(n1.length==0||n2.length==0){
    alert("Miss information, please try again!");
    window.location.reload();
    return false;
  }
}
</script>
<head>  
  <meta charset="utf-8" />
  <title>Concert Club | Web Application</title>
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
        if(isset($_SESSION["username"])) {
          echo "You are already logged in. ";
          echo "You will be redirected in 3 seconds or click <a href=\"index.php\">here</a>.";
          header("refresh: 1; index.php");
                  }
         else { //first check whether we accept the input.
            if(isset($_POST["username"]) && isset($_POST["password"])&&isset($_POST["name"])&&isset($_POST["identity"])) {
              if ($_POST["identity"]=='nuser'){
                if ($stmt = $mysqli->prepare("select username from users where username = ?")) {//check whether the username exists in db
                  $stmt->bind_param("s", $_POST["username"]);
                  $stmt->execute();
                  $stmt->bind_result($username);
                    if ($stmt->fetch()) {
                      echo "That username already exists. ";
                      echo "You will be redirected in 3 seconds or click <a href=\"signup.php\">here</a>.";
                      header("refresh: 1; signup.php");
                      $stmt->close();
                              }
                                                   //if not then insert the entry into database, note that user_id is set by auto_increment
                    else {
                      $stmt->close();
                      if ($stmt = $mysqli->prepare("insert into users (username,passwords,namess) values (?,?,?)")) {
                        $stmt->bind_param("sss", $_POST["username"], $_POST["password"],$_POST["name"]);
                        $stmt->execute();
                        $stmt->close();
                        $_SESSION["username"]=$_POST["username"];// add the newly registered user to current session.
                        $_SESSION['name'] = $_POST['name'];
                        $_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
                        echo 'Registration complete, click <a href="index.php"><font color="red">here</font></a> to return to homepage.'; 
						header("refresh: 1; signup.php");
                        }     
                      }  
                }
              }
              else 
              {
			       if ($stmt = $mysqli->prepare("select username from users where username = ?")) {//check whether the username exists in db
                  $stmt->bind_param("s", $_POST["username"]);
                  $stmt->execute();
                  $stmt->bind_result($username);
                    if ($stmt->fetch()) {
                      echo "That username already exists. ";
                      echo "You will be redirected in 3 seconds or click <a href=\"signup.php\">here</a>.";
                      header("refresh: 1; signup.php");
                      $stmt->close();
                              }
                                                   //if not then insert the entry into database, note that user_id is set by auto_increment
                    else {
                      $stmt->close();
                      if ($stmt = $mysqli->prepare("insert into users (username,passwords,namess) values (?,?,?)")) {
                        $stmt->bind_param("sss", $_POST["username"], $_POST["password"],$_POST["name"]);
                        $stmt->execute();
                        $stmt->close();
                        $_SESSION["username"]=$_POST["username"];// add the newly registered user to current session.
                        $_SESSION['name'] = $_POST['name'];
                        $_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
  
                        }     
                      }  
                }
                   header("refresh: 1; signup_a.php");
              }
            }
            else{ // here give the register form if needed.
              ?>
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html"><span class="h1 font-bold"><font color="#8600FF">Cclub</font></span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong><font color="#8600FF">Sign up to find interesting concerts</font></strong>
        </header>
        <form action="signup.php" method="post" onsubmit="return verify()">
          <div class="form-group">
            <input placeholder="Accountname" id="username" name="username" class="form-control rounded input-lg text-center no-border">
          </div>
           <div class="form-group">
            <input placeholder="Nickname" id="password" name="name" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
            <input type="password" id="ps1" name="password" placeholder="Password" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
             <input type="password" id="ps2" placeholder="Confirm Password" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
               <div class="col-md-5 templatemo-radio-group">
               <b>Account Type: </b>
               </div>
                 <div class="col-md-7 templatemo-radio-group"> 
                  <label class="radio-inline">
                    <input type="radio" name="identity" id="nuser" value="nuser" checked> Normal User
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="identity" id="artist" value="artist"> Artist
                  </label>
                </div>             
          </div> 
          <br>
          <div class="checkbox i-checks m-b">
            <label class="m-l">
              <input type="checkbox" checked=""><i></i> Agree the terms and policy, see details <a href=""><font color="red">here</font></a>
            </label>
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign up</span></button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Already have an account?</small></p>
          <a href="signin.php" class="btn btn-lg btn-info btn-block btn-rounded">Sign in</a>
        </form>
      </section>
    </div>
  </section>
  <?php }} ?>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
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