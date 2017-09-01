<? include 'included.php'; session_start(); ?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$getida = $_GET['dropid'];
$getid = preg_replace($saturated,"",$getida);
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];
?>

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
if($_POST['blockcasinos']){
mysql_query("UPDATE users SET blockcasinos='1' WHERE username='$usernameone'");
echo"<font color=silver face=verdana size=2>You blocked the casinos from being sent to you!</font>"; } ?>

<?php
if($_POST['unblockcasinos']){
mysql_query("UPDATE users SET blockcasinos='0' WHERE username='$usernameone'");
echo"<font color=silver face=verdana size=2>You unblocked the casinos from being sent to you!</font>";}?>

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Casino Settings</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt=""></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">

<center>

<?
$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$casinoblock = $setownerinfoarray['blockcasinos'];
?>

<table width=45%>
<div class=tab4><font color=silver face=verdana size=2><?php if($casinoblock=='1'){ echo"Casinos are blocked!";}ELSE{ echo"Casinos aren't blocked!";}?></font></div>
<br>
<form method='post'>
<input type=submit class='textbox' name='unblockcasinos' value='Unblock Casinos!'> <font color=silver> - </font> <input type=submit class='textbox' name='blockcasinos' value='Block Casinos!'>
</form></center>

</table><br></td>

<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">

<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>