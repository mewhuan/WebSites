<?php 
include "connect.php";
echo '<select name="location">';
 if($stmt=$mysqli->prepare("select vname from venue")){
    $stmt->execute();
	$stmt->bind_result($vname);

	while($stmt->fetch())
	{
	echo '  <option value="';
    echo "$vname";
    echo  '"';
    echo ">$vname</option>";			
	}

	$stmt->close();
}
	echo '</select>';
$mysqli->close(); 
?>