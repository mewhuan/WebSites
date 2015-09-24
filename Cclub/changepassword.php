<?php
include 'connect.php';

  if (isset($_POST["password1"])&&isset($_POST["password2"]) ){

           if ($stmt = $mysqli->prepare("select passwords from users where username = ?")) {
                   $stmt->bind_param("s", $_SESSION["username"]);
                   $stmt->execute();
                   $stmt->bind_result($password);
				   $stmt->fetch();
				   if ($password==$_POST["password1"]){
				   $stmt->close();
				   if ($stmt = $mysqli->prepare("update users set passwords=? where username=?")){
	               $stmt->bind_param("ss",$_POST['password2'],$_SESSION['username']);
		           $stmt->execute();
		           $stmt->close();
				   $_SESSION['counter']=0;
		           header("refresh: 0; account.php");
	                }				   				   
				   }
				   else{
				   $stmt->close();
                   $_SESSION['counter']=1;
				   header("refresh:5; account.php");
				     $errorsss=$_SESSION['counter'];
				   echo "$errorsss";
				  
			   }             	   
			   }
  }
  else {
  
           
    if ($_SESSION['counter']==0) {  echo  '<div class="container"> 
                            <div class="col-md-12"> 
							  <div class="col-md-12 pull-left">									 
							  </div>
                              <form class="form-horizontal templatemo-contact-form-2 templatemo-container" role="form" action="changepassword.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <input type="password" name="password1" class="form-control" id="password1" placeholder="Last Password">
                                              </div>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <input type="password" name="password2" class="form-control" id="password2" placeholder="New Password">
                                              </div>
                                            </div>
                                        </div>											
                                         <div class="form-group">
                                      <div class="col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-warning pull-right">               
                                      </div>
                                    </div>   
                                  </div>
                               
                                </div>                 
                              </form>                             
                            </div>
                          </div> ';
                       
  }
  else{
     echo  '<div class="container"> 
                            <div class="col-md-12"> 
							  <div class="col-md-12 pull-left">	
                				<h3>The last input password was incorrect!!!</h3>						
							  </div>
                              <form class="form-horizontal templatemo-contact-form-2 templatemo-container" role="form" action="changepassword.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <input type="password" name="password1" class="form-control" id="password1" placeholder="Last Password">
                                              </div>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <input type="password" name="password2" class="form-control" id="password2" placeholder="New Password">
                                              </div>
                                            </div>
                                        </div>											
                                         <div class="form-group">
                                      <div class="col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-warning pull-right">               
                                      </div>
                                    </div>   
                                  </div>
                               
                                </div>                 
                              </form>                             
                            </div>
                          </div> ';
  
  }  
  }

  $mysqli->close();

?>
