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
            if(isset($_POST["hyperlink"]) && isset($_POST["message"])) {
              

                      if ($stmt = $mysqli->prepare("insert into artist (username, hyperlink,description) values (?,?,?)")){
							$stmt->bind_param("sss",$_SESSION['username'],$_POST['hyperlink'],$_POST['message']);
							$stmt->execute();
							$stmt->close();
                         }
                   header("refresh: 1; index.php");
              
            }
            else{ // here give the register_artist form if needed.
              ?>
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html"><span class="h1 font-bold"><font color="#8600FF">Cclub</font></span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong><font color="#8600FF">Here is some additional Info for Artists</font></strong>
        </header>
        <form action="signup_a.php" method="post" onsubmit="return verify()">
          <div class="form-group">
            <input placeholder="Hyperlink" id="hyperlink" name="hyperlink" class="form-control rounded input-lg text-center no-border">
          </div>
           <div class="form-group">
                                                                                        
          <textarea rows="8" cols="50" name="message" class="form-control" id="message" placeholder="Writer your own discription here.."></textarea> </div>
                                          
          </div>
          <br>
          <div class="checkbox i-checks m-b">
            <label class="m-l">
              <input type="checkbox" checked=""><i></i> Agree the terms and policy, see details <a href=""><font color="red">here</font></a>
            </label>
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Put In</span></button>
        </form>
      </section>
    </div>
  </section>
  <?php } ?>
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