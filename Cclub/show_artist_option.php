<?php 
include "connect.php";
echo '<select name="artist">';
 if($stmt=$mysqli->prepare("select artist.username,namess from artist natural join users")){
    $stmt->execute();
	$stmt->bind_result($username,$name);

	while($stmt->fetch())
	{
	echo '  <option value="'.$username.'">'.$name.'</option>';		
	}

	$stmt->close();
}
	echo '</select>';
$mysqli->close(); 
?>