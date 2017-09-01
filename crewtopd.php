<? include 'included.php'; session_start(); ?>
<html>
<head>
<title>ToughDons.com</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php 
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];


$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$crewid = $getuserinfoarray['crewid'];


$f = mysql_query("SELECT * FROM crews WHERE id = '$crewid'");
$fg = mysql_fetch_array($f);
$crewbank = number_format($fg['cash']);



if($crewid == '0'){die('<font color=white face=verdana size=1>Your not in a crew</font>');}

$money = mysql_query("SELECT * FROM users WHERE crewid = '$crewid' ORDER BY crewd DESC LIMIT 0,200");


?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Crew Top Donators</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt=""></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">

<table width=35% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td colspan=2><div class=tab>Crew Donators</td></tr>
<tr><td width=50%><div class=tab>Username:</td><td width=50%><div class=tab>Amount:</td></tr>
<?
while($moneys = mysql_fetch_array($money)){
$nam = $moneys['username'];
$mona = number_format($moneys['crewd']);
echo"<tr><td><div class=button1><a href=viewprofile.php?username=$nam>$nam</a></td><td><div class=button1>$$mona</td></tr>"; }?>
<font color=999999 face=verdana size=1>Crew balance: <font color=khaki>$<b><?echo$crewbank;?></font></b><br><br>
</td>
</tbody></table><br></td>
<td class=menuright><img style="display: block"  alt="" width=8></td>
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

</body></html>