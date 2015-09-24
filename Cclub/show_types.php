<?php 
include "connect.php";
echo '<select name="types">';
 if($stmt=$mysqli->prepare("select subtype from type")){
    $stmt->execute();
	$stmt->bind_result($subtypes);

	while($stmt->fetch())
	{
	echo '  <option value="';
    echo "$subtypes";
    echo  '"';
    echo ">$subtypes</option>";			
	}

	$stmt->close();
}
	echo '</select>';
$mysqli->close(); 
?>