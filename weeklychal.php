<? include 'included.php'; session_start(); ?>
<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">

<?php
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$time = time();
$edittopicraw= $_POST['edittopic'];
$edittopic = htmlentities($edittopicraw , ENT_QUOTES);
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];

$guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
$openx = mysql_fetch_array($guessopen);
$openxox = $openx['time'];

$weeklyxox = mysql_num_rows(mysql_query("SELECT * FROM weeklychal WHERE username = '$usernameone'"));
if($weeklyxox < 1){ mysql_query("INSERT INTO `weeklychal` (username,total) VALUES ('$usernameone','0')"); }

if($_POST['openbub']){ 
if($openxox == 1){ mysql_query("UPDATE gametimes SET time = 0 WHERE game = 'weekly'"); $showoutcome++; $outcome = "Weekly Challenge is now locked!"; }
else{ mysql_query("UPDATE gametimes SET time = 1 WHERE game = 'weekly'"); $showoutcome++; $outcome = "Weekly Challenge is now unlocked!"; }}
?> 

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Weekly Challenge </b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png" align="center">
<table align="center" width="85%" cellpadding="0" cellspacing="1">

<div align=left><?if($usernameone == 'Pentium' || $usernameone == 'Jack'){ echo "<form method=post><input type=submit class=textbox name=openbub value='Open/Close!'></form><br><br>"; }?></div>

<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>

<font color=gold face=verdana size=2>- First place gets <b>500</b> points & <b>$50,000,000</b>!<br></font>
<font color=silver face=verdana size=2>- Second place gets <b>350</b> points & <b>$35,000,000</b>!<br></font>
<font color=bronze face=verdana size=2>- Third place gets <b>150</b> points & <b>$15,000,000</b>!<br></font>

<table cellpadding="0" cellspacing="1" width=50% align="center" class="section">
<tr><td colspan=3 width=100%><div class=tab>Weekly Challenge</td></tr>
<tr><td colspan=3 width=100%><div class=tab>Closing Date: 24/12/2013</td></tr>
<tr><td width=50%><div class=tab>Username:</td><td width=50%><div class=tab>Total Jailbusts:</td></tr>
<?
$weeklyuser = mysql_query("SELECT * FROM weeklychal ORDER BY total DESC LIMIT 0,30");
while($weeklyusers= mysql_fetch_array($weeklyuser)){
$total = $weeklyusers['total'];
$name = $weeklyusers['username'];

echo"<tr><td height=10 bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=silver size=1 face=verdana><center>$name</center></font></a><td height=10 bgcolor=#222222 NOWRAP><font color=yellow size=1 face=verdana><center>$total</center></font></td></tr>";}?>
<br>

</tbody></table><br></td>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>
</body></html>