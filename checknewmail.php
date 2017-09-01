<?php


include 'included2.php'; 


$userids = $_GET['userid'];

$saturate = "/[^a-z0-9]/i";
$saturatesd = "/[^0-9]/i";
$sessionid = preg_replace($saturate,"",$sessionidbefore);
$userid = preg_replace($saturatesd,"",$userids);



$statustest = mysql_query("SELECT mail FROM users WHERE ID = '$userid' LIMIT 1");
$statustesttwo = mysql_fetch_array($statustest);
$mails = $statustesttwo['mail'];


 if($mails >= '1'){echo"<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>$mails</b></font><font color=white size=1 face=verdana>)</font></a>";}else{echo"<a href=inbox.php>Inbox</a>";}
?>