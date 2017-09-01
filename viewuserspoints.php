<? include 'included.php'; session_start(); ?>
<?
$timeraw = time();
$time = $timeraw + 43200;
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$userinfosql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$playerip'");
$userinfo = mysql_fetch_array($userinfosql);
$username = $userinfo['username'];
$usersql = mysql_query("SELECT * FROM users WHERE username = '$username'");
$userarray = mysql_fetch_array($usersql);
$userswiss = $userarray['swiss'];
$rankid = $userarray[rankid];

if($rankid < '25'){die(' ');}

$jailtest = mysql_query("SELECT * FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>
<html>
<head>
<title>:: StateGangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php
$saturated = "/[^0-9]/i";
$saturatedname = "/[^a-z0-9]/i";
$getname = $_GET['username'];
$name = preg_replace($saturatedname,"",$getname);


$lasttensql = mysql_query("SELECT * FROM pointssent WHERE username = '$name' ORDER BY id DESC");

$lasttenrsql = mysql_query("SELECT * FROM pointssent WHERE sent = '$name' ORDER BY id DESC");

?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Users sent points</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<table width=100%><tr><td width=50%>
<div align="center" valign=top>
<table cellpadding="0" cellspacing="1" align="center">
<tr><td width="180" bgcolor="444444" align="center" NOWRAP><font color="222222" size="1" face="verdana"><b>Last Sent</b></font></td></tr>
<?php 
while($lasttenarray = mysql_fetch_array($lasttensql)){
$lasttento = $lasttenarray['sent'];
$qt = $lasttenarray['quicktrade'];
$lasttenamount = number_format($lasttenarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=khaki size=1 face=verdana>$name</a><font color=white> sent <b>$lasttenamount</b> points to <a href=viewprofile.php?username=$lasttento><font color=khaki size=1 face=verdana>$lasttento</font></a> (QT)</td></tr>";}
else{ echo"<tr><td bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=khaki size=1 face=verdana>$name</a><font color=white> sent <b>$lasttenamount</b> points to <a href=viewprofile.php?username=$lasttento><font color=khaki size=1 face=verdana>$lasttento</font></a></td></tr>";}}?>
</table></td>
<td width=50% valign=top>
<table cellpadding="0" cellspacing="1" align="center">
<tr><td width="180" bgcolor="444444" align="center" NOWRAP><font color="222222" size="1" face="verdana"><b>Last Received</b></font></td></tr>
<?php 
while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
$lasttenrto = $lasttenrarray['username'];
$qt = $lasttenrarray['quicktrade'];
$lasttenramount = number_format($lasttenrarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=khaki size=1 face=verdana>$name</a><font color=white> recieved <b>$lasttenramount</b> points from <a href=viewprofile.php?username=$lasttenrto><font color=khaki size=1 face=verdana>$lasttenrto</font></a> (QT)</td></tr>";}
else{ echo"<tr><td bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=khaki size=1 face=verdana>$name</a><font color=white> recieved <b>$lasttenramount</b> points from <a href=viewprofile.php?username=$lasttenrto><font color=khaki size=1 face=verdana>$lasttenrto</font></a></td></tr>";}}?>
</table>
</div>

</tbody></table></td>
<td class=menuright><img style="display: block"  src="blank.gif" after alt="" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt=""></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
</tr></tbody></table></div>

</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>