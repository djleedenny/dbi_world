<?php
function OpenCon()
 {
 $dbhost = "mercury.nottingham.edu.my";
 $dbuser = "hfynm5_hfynm5";
 $dbpass = "hannatakcomel";
 $db = "hfynm5_world";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }

?>
