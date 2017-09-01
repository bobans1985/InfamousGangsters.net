<? include 'included.php'; session_start(); ?>

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

$time = time();
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

$statustest = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$statustesttwo = mysql_fetch_array($statustest);
$button = $statustesttwo['sentmsgs'];
$button = ceil($button / 5);

$getmembers = mysql_query("SELECT * FROM entertainers");

$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$playerrank = $playerarray['rankid'];

if($playerrank < '25'){die(' ');}

if(isset($_POST["$button"])) { 
if(!$sendinfo){}else{
while($crewmsg = mysql_fetch_array($getmembers)){
$crewname = $crewmsg['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$crewname','$gangsterusername','yes','$userip','$sendinfo')");}
mysql_query("INSERT INTO forumposts(username,topicid,type,post,rankid,esc)
VALUES ('$gangsterusername','8020','hdof','$sendinfo','$playerrank','1')");
$showoutcome++; $outcome = "<font color=white face=verdana size=1>Your message to all the entertainers been sent!</font>";}}


?> 

<? if($showoutcome>=1){ ?>
<table width="100%" align="center" cellpadding="0" cellspacing="10" class="section">
<tr><td align=center><div class=button1><?echo$outcome?></td></tr>
</table>
<? } ?>

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Send Ent Message</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<br><center><font color="white" face="verdana" size="1">Message:</font><br><form action="" method="post" name="smiley">
<textarea name="sendinfo" cols="42" rows="11" class="textbox"></textarea><br>
<input type ="submit" value="Send message" class="textbox" name="<? echo"$button";?>"></center>
</form>

</tbody></table><br></td>
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