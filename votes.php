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
?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Player Ratings</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section"><? $getuser = $_GET['user']; ?>

<table width="95%" border="0" align=center><tr><td width="45%" valign="top">
<table cellpadding=0 cellspacing=1 width=99% align="center">
<tr><td width=100% bgcolor=#444444 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=white face=verdana size=1>(<b>+</b>)</font></td></tr>
<?  
$result = mysql_query("SELECT * FROM playerratings WHERE rated='$getuser' AND type='plus' ORDER BY username ASC") or die("Error 12020");
while($row = mysql_fetch_array( $result )) {
$userwhovoted = $row['username'];
echo "<tr><td align=center bgcolor=222222><font size=1 face=verdana color=silver><a href='viewprofile.php?username=$userwhovoted'><b>$userwhovoted</b></a></td></tr>"; }?>
</table><br></td></div>

<td width="45%" valign="top">
<table cellpadding=0 cellspacing=1 width=99% align="center">
<tr><td width=100% bgcolor=#444444 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=white face=verdana size=1>(<b>-</b>)</font></td></tr>
<?
$result = mysql_query("SELECT * FROM playerratings WHERE rated='$getuser' AND type='minus' ORDER BY username ASC") or die("Error 12020");
while($row = mysql_fetch_array( $result )) {
$userwhovoted = $row['username'];
echo "<tr><td align=center bgcolor=222222><font size=1 face=verdana color=silver><a href='viewprofile.php?username=$userwhovoted'><b>$userwhovoted</b></a></td></tr>"; }?>
</table><br></td></div>

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

</body></html>