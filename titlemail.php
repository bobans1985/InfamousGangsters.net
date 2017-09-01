<?php
include 'included2.php'; 

$userids = mysql_real_escape_string($_GET['userid']);

$saturate = "/[^a-z0-9]/i";
$saturatesd = "/[^0-9]/i";

$userid = preg_replace($saturatesd,"",$userids);
$time = time();

$statustest = mysql_query("SELECT * FROM users WHERE ID = '$userids' LIMIT 1");
$statustesttwo = mysql_fetch_array($statustest);
$mails = $statustesttwo['mail'];



 if($mails >= '1'){echo"New Mail!";}

?>