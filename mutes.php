<? include 'included.php'; session_start(); ?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
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
$saturates = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$chosenraw = $_POST['spend'];
$chosen = preg_replace($saturates,"",$chosenraw);

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getref = $getuserinfoarray['ref'];
$rank= $getuserinfoarray['rankid'];

$topten = mysql_query("SELECT * FROM muted  ORDER BY time DESC LIMIT 0,50");

if($rank < '25'){die(' ');} ?> 

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Latest Mutes</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">

<? if ($rank >= 25){echo"<center><br><br>";?>

<table cellpadding="0" cellspacing="1" width=75% align="center" class="section">
<tr><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Muted IP</b>:</font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Done by</b>:</font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Date</b>:</font></td></tr><?
while($toptena = mysql_fetch_array($topten)){
$refname = $toptena['username'];

$refpoin = $toptena['mutedby'];
$ip= $toptena['ip'];
$time = $toptena['time'];
echo"<tr><td width=25% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$refname><font color=white face=verdana size=1>$refname&nbsp;&nbsp;</font></a></td><td width=25% bgcolor=#222222 NOWRAP><a href=duperesults.php?ip=$ip>$ip&nbsp;&nbsp;</a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$refpoin&nbsp;&nbsp;</font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$time&nbsp;&nbsp;</font></td></tr>"; }
?></table><br><?}?>
</center></font><br>
<td class=menuright><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>

