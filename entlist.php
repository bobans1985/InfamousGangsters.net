<? include 'included.php'; session_start(); ?>
<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rank = $getuserinfoarray['rankid'];

if($rank < 25){die(' ');}
?> 

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Ent List</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<br>

<br><table cellpadding="0" cellspacing="1" width=75% align="center" class="section">
<tr><td colspan=3 width=100%><div class=tab>Entertainers</td></tr>
<tr><td width=15%><div class=tab>Username:</td><td width=25%><div class=tab>Status:</td><td width=15%><div class=tab>Pen Points:</td></tr><?
$entertainers = mysql_query("SELECT * FROM users WHERE ent = '1'");

while($etainers = mysql_fetch_array($entertainers)){
$name = $etainers['username'];
$by = $etainers['status'];

$status = $etainers['status'];
$pts = $etainers['penpoints'];

if($status == 'Dead'){$color = 'red';$fcolor = '<font color=black face=verdana size=1><b>';}else{$color = '#222222';$fcolor = '<font color=khaki face=verdana size=1><b>';}

echo"<tr><td height=10 width=40% bgcolor=$color  NOWRAP><a href=viewprofile.php?username=$name>$fcolor$name</b></font></a></td><td height=10 width=40% bgcolor=$color NOWRAP><a href=viewprofile.php?username=$by>$fcolor$by</b></font></a></td><td height=10 width=20% bgcolor=$color NOWRAP>$fcolor$pts</b></font></td></tr>";}?>
</table><br><br>

<td class=menuright><img style="display: block"  src="blank.gif" after alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>

</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>

