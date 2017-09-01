<?php
include 'connecter.php'; 

$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];
$sessionidbefore = $_COOKIE['PHPSESSID'];$userip = $_SERVER[REMOTE_ADDR]; 
$userids = $_GET['username'];

$saturate = "/[^a-z0-9]/i";
$saturatesd = "/[^0-9]/i";
$sessionid = preg_replace($saturate,"",$sessionidbefore);
$userid = preg_replace($saturate,"",$userids);
$time = time();




$counnewsql = mysql_query("SELECT SUM(new) AS newt FROM forumtopics WHERE creator = '$userid' AND type = 'main'");
$counnew = mysql_fetch_array($counnewsql);
$mails = $counnew['newt'];



 if($mails >= '1'){echo"<a href=mytopics.php>My Topics <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>$mails</b></font><font color=white size=1 face=verdana>)</font></a>";}else{echo"<a href=mytopics.php>My Topics</a>";}
?>