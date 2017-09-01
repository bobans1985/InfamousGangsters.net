<? include 'included.php'; session_start();?>



<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];


$sendinforaw = $_POST['sendinfo'];
$sendinfo = htmlentities($sendinforaw, ENT_QUOTES); 

$adminchecksql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'")or die(mysql_error());
$admincheckarray = mysql_fetch_array($adminchecksql);
$admincheck = $admincheckarray['rankid'];


if($admincheck < '100'){die(' ');}

if($_POST['do']){
$getdeadd = mysql_query("SELECT * FROM users WHERE location = 'Chicago' AND status = 'Alive' ORDER BY id");
while($getdead = mysql_fetch_array($getdeadd)){
$deaduser = $getdead['username'];
mysql_query("UPDATE users set location = 'Las Vegas' WHERE username = '$deaduser'");

}}

?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt="" src="blank.gif" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Supers</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" src="blank.gif" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" src="blank.gif" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" src="blank.gif" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" src="blank.gif" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<br><center><form action="" method="post"><input type="submit" value="Update Location" class="textbox" name="do"></center><br></form>
</tbody></table></td>
<td class=menuright><img style="display: block"  src="blank.gif" after alt="" src="blank.gif" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" src="blank.gif" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>

</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>


