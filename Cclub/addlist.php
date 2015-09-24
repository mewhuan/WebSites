<html lang="en" class="app">
<?php include 'connect.php';?>
<?php date_default_timezone_set('America/New_York'); ?>
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
<body class="bg-info dker">
<?php 
$cid = $_GET['cid'];
$username = $_SESSION['username'];
$flag = 0;
if((isset($_GET['listname'])||isset($_GET['newname']))&&isset($_SESSION['username'])){
	$rname = $_GET['listname'];
	if($rname=="none"){
		$rname = $_GET['newname'];
		$flag = 1;
		$type = $_GET['typename'];
	}
	if(!empty($rname)){
		$stmt = $mysqli->prepare("select * from recommendlist where rname='$rname' and username='$username' and cid='$cid'");
		$stmt->execute();
		if($stmt->fetch()){
			$back = $_SERVER["HTTP_REFERER"];
			$stmt->close();
			echo '<font color="red" size="4">It\'s already in that list, redirecting in 3 seconds.</font>';
	  		header("refresh: 3; main.php");
		}
		else if($flag==0){
			$stmt->close();
			$now =date("Y-m-d H:i:s");
			$stmt = $mysqli->prepare("insert into recommendlist values('$cid','$username','$rname','$now')");
			$stmt->execute();
			$stmt->close();
			echo '<font color="red" size="4">Success.</font>';
			header("refresh: 2; main.php");
		}
		else if($flag==1&&$type!="none"){
			$stmt->close();
			$now =date("Y-m-d H:i:s");
			$stmt = $mysqli->prepare("insert into recommendlist values('$cid','$username','$rname','$now')");
			$stmt->execute();
			$stmt->close();
			$stmt = $mysqli->prepare("insert into recommend_type values('$cid','$username','$type','$rname')");
			$stmt->execute();
			$stmt->close();
			echo '<font color="red" size="4">Success.</font>';
			header("refresh: 2; main.php");
		}
	}
	else{
		echo '<font color="red" size="4">Miss information, please try again.</font>';
		header("refresh: 3; addlist.php");
	}
}
else{
?>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.php"><span class="h1 font-bold"><font color="#8600FF">Cclub</font></span></a>
      <section class="m-b-lg">
        <form action="addlist.php" method="get">
        	<div class="text-left m-t m-b"><font size="3" color="red">Create a new list, and select its type</font></div>
          <div class="form-group">
            <input type="text" placeholder="List Name" name="newname" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
             <select style="width:200px" name="typename">
			      <option value="none">select the type</option>
			      <?php
			      $stmt = $mysqli->prepare("select subtype from type");
			      $stmt->execute();
			      $stmt->bind_result($type);
			      while($stmt->fetch()){
			      	echo '<option value="'.$type.'">'.$type.'</option>';
			      }
			      ?>
			</select>
          </div>
          <div class="text-left m-t m-b"><font size="3" color="red">Or select an exist one</font></div>
          <div class="form-group">
             <select style="width:200px" name="listname">
			      <option value="none">select your list</option>
			      <?php
			      $stmt = $mysqli->prepare("select distinct(rname) from recommendlist where username='$username'");
			      $stmt->execute();
			      $stmt->bind_result($rname);
			      while($stmt->fetch()){
			      	echo '<option value="'.$rname.'">'.$rname.'</option>';
			      }
			      ?>
			</select>
          </div>
          <input type="hidden" name="cid" value="<?php echo $cid;?>">
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Add it</span></button>
          <div class="line line-dashed"></div>
          <a href="main.php" class="btn btn-lg btn-info btn-block rounded">Go Back</a>
        </form>
      </section>
    </div>
  </section>
<?php
}
$mysqli->close();
?>
</body>
</html>