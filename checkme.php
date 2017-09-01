<?php 
$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];



$bar =  $_SERVER['PHP_SELF'];

 




$time = time();
$usarsone = rand(0,750);
$timer = time() - 4000;


$th = rand(0,2);

$a= ""."VEEybF6cAqD";
$sessionidbefore = $_COOKIE['PHPSESSID'];
$userip = $_SERVER[REMOTE_ADDR]; 



$saturate = "/[^a-z0-9]/i";
$sessionid = preg_replace($saturate,"",$sessionidbefore);
$time = time();


$doit = mt_rand(0,2000);

$timetime = time();
$newbuf = $timetime + 1800;



if(1 == 92){
$statustest = mysql_query("SELECT * FROM users WHERE ID = '$usasid'");
$statustesttwo = mysql_fetch_array($statustest);

$deadalive = $statustesttwo['status'];
$locition = $statustesttwo['location'];
$mails = $statustesttwo['mail'];
$coon = $statustesttwo['coon'];
$ida = $statustesttwo['ID'];
$passy = $statustesttwo['password'];
$tips = $statustesttwo['tips'];
$stop = $statustesttwo['stop'];
$pointss = $statustesttwo['points'];
$pts = $statustesttwo['penpoints'];
$nwa = $statustesttwo['newee'];
$myrank = $statustesttwo['rankid'];
$change = $statustesttwo['chnge'];
$usermd = md5($statustesttwo['username']);




$vote = $statustesttwo['voteone'];
$votetwo = $statustesttwo['vote2'];
$ent = $statustesttwo['ent'];

$refid = $statustesttwo['refid'];
}




?>