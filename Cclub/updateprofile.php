<?php
include "connect.php";

$name = $_SESSION['username'];
$target_dir = "./images/";
$target_name = $target_dir.basename($_FILES['file']['name']);
echo $target_name;
if(is_uploaded_file($_FILES['file']['tmp_name'])){
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_name)){

        if (!$link = mysql_connect('localhost', 'root', '')) {
            echo 'Could not connect to mysql';
            exit;
        }
 
        if (!mysql_select_db('project', $link)) {
            echo 'Could not select database';
            exit;
        }
 
        $sql    = "update users set image=$target_name where username=$name";
        $result = mysql_query($sql, $link);
 
        if (!$result) {
            echo "DB Error, could not create table the database\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }

        mysql_free_result($result);
    }
    else{
        echo "fail";
    }
}

if ($stmt = $mysqli->prepare("update users set namess=?,email=?,city=?,dob=? where username=?")){
	    $stmt->bind_param("sssss",$_POST['name'],$_POST['email'],$_POST['city'],$_POST['dob'],$_SESSION['username']);
		$stmt->execute();
		$stmt->close();
		header("refresh: 0; account.php");
	}
 $mysqli->close();

?>