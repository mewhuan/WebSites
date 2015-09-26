<?php
//<!-- Example Blog written by Raymond Mui -->

$mysqli = new mysqli("localhost", "root", "524971", "web");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
session_start();
// start session, check session IP with client IP, if no match start a new session
if(isset($SESSION["REMOTE_ADDR"]) && $SESSION["REMOTE_ADDR"] != $SERVER["REMOTE_ADDR"]) {
  session_destroy();
  session_start();
}

?>
