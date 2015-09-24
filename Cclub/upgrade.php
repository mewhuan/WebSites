<?php
include 'connect.php';
if ($stmt = $mysqli->prepare("select hyperlink,description from artist where username=?")) {
  $stmt->bind_param("s",$_SESSION["username"]);
  $stmt->execute();
  $stmt->bind_result($hyperlink, $description);
  if ($stmt->fetch()) {
        echo '       
                         <div class="container">
                            <div class="col-md-12"> 
							  <div class="col-md-12">	
                				<h3>Here Is Your Current Aritist Info:</h3>	 ';
    
									echo '<table>';
									echo "<tr><td>Hyperlink:</td><td>$hyperlink</td></tr>";
									echo "<tr><td>Description:</td><td>$description</td></tr>";
									echo '</table>';// first line div deleted

								 
		echo' <h3>Change Your Account Information here:</h3>
							  </div>    
                            <form class="form-horizontal templatemo-contact-form-2 templatemo-container" role="form" action="update_artist.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <input type="text" name="link" class="form-control" id="link" placeholder="Hyperlink to your own Website">
                                              </div>
                                            </div>
                                        </div>
                                          
										<div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <textarea rows="8" cols="50" name="message" class="form-control" id="message" placeholder="Writer your own discription here.."></textarea>
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
                          </div>
                        </div> ';

  }
  else {
  
           
              echo  '<div class="container"> 
                            <div class="col-md-12"> 
							  <div class="col-md-12">	
                				<h3>Become an artist:</h3>								 
							  </div>
                              <form class="form-horizontal templatemo-contact-form-2 templatemo-container" role="form" action="update_artist.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <input type="text" name="link" class="form-control" id="link" placeholder="Hyperlink to your own Website">
                                              </div>
                                            </div>
                                        </div>
                                          
										<div class="form-group">
                                            <div class="col-sm-12">
                                              <div class="templatemo-input-icon-container">
                                                <textarea rows="8" cols="50" name="message" class="form-control" id="message" placeholder="Writer your own discription here.."></textarea>
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
  $stmt->close();
  $mysqli->close();
}


















?>