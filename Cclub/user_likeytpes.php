<?php
include "connect.php";
if($stmt=$mysqli->prepare("select subtype from user_like where username=?")){
   $stmt->bind_param("s",$_SESSION["username"]);
   $stmt->execute();
   $stmt->bind_result($types);
   echo '<h5 class="font-bold">Your Current Liked Types:</h5>';
   echo '<div class="tags m-b-lg l-h-2x">';
   while ($stmt->fetch())
   {
      $newtype = str_replace(" ","%20",$types);
   echo' <a href="#" class="label bg-primary" onclick=window.location.href="deletetype.php?type='.$newtype.'">';
   echo "$types <font color='red'>x</font></a>";
   }
   echo '</div>';
   if(empty($types)){ echo '<small>You current have no liked types,chose the types below:</small>';}//if no types liked now.
   $stmt->close();
}
   echo '<h5 class="font-bold">Add Like Types:</h5>';

echo '<form action = "addtypes.php" method="POST">
<select name="types">';
if($stmt=$mysqli->prepare("select subtype from type where subtype not in (select subtype from user_like where username=?)")){
  $stmt->bind_param("s",$_SESSION["username"]);
 $stmt->execute();
 $stmt->bind_result($subtype);
 while($stmt->fetch()){  
   echo '  <option value="';
   echo "$subtype";
   echo  '"';
   echo ">$subtype</option>";			
	}
 $stmt->close();
}
if(empty($subtype)) {
   echo '  <option value="';
   echo "notype";
   echo  '"';
   echo ">No Types</option>";	
}
echo'
</select><input type = "submit" value = "Add Fun Types " >
</form> ';

$mysqli->close();
?>