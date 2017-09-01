<? include 'included.php'; session_start(); ?>
<html>
<head>
<title:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

if($rank < 100){die(' ');}

$topten = mysql_query("SELECT * FROM kills ORDER BY id ASC LIMIT 0,50");
?> 

<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Recent Kills</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<br>

<br>
<table cellpadding="0" cellspacing="1" width=75% align="center" class="section">
<tr><td colspan=5 width=100%><div class=tab>Recent Kills</td></tr>
<tr><td width=15%><div class=tab>Victim:</td><td width=25%><div class=tab>Rank:</td><td width=15%><div class=tab>Killer:</td><td width=15%><div class=tab>Reason:</td></tr><?
$lastmod = mysql_query("SELECT * FROM kills ORDER BY id DESC LIMIT 0,50");

while($lasttenmodkilled = mysql_fetch_array($lastmod)){
$reason = html_entity_decode($lasttenmodkilled['reason'],ENT_NOQUOTES);
$name = $lasttenmodkilled['victim'];
$killer = $lasttenmodkilled['killer'];

$modranks = $lasttenmodkilled['rankid'];

$etest = mysql_query("SELECT username FROM entertainers WHERE username  = '$name'");
$etests = mysql_num_rows($etest);

if($etests > '0'){$modrank = '<b>Entertainer</b>';}
elseif($modranks == '1'){ $modrank = 'Newbie'; }
elseif($modranks == '2'){ $modrank = 'Tramp';}
elseif($modranks == '3'){ $modrank = 'Minor';}
elseif($modranks == '4'){ $modrank = 'Vandal';}
elseif($modranks == '5'){ $modrank = 'Crafter';}
elseif($modranks == '6'){ $modrank = 'Respected Crafter';}
elseif($modranks == '7'){ $modrank = 'Businessman';}
elseif($modranks == '8'){ $modrank = 'Respected Businessman';}
elseif($modranks == '9'){ $modrank = 'State Businessman';}
elseif($modranks == '10'){ $modrank = 'Hitman';}
elseif($modranks == '11'){ $modrank = 'Respected Hitman';}
elseif($modranks == '12'){ $modrank = 'State Hitman';}
elseif($modranks == '13'){ $modrank = 'Godfather';}
elseif($modranks == '14'){ $modrank = 'Respected Godfather';}
elseif($modranks == '15'){ $modrank = 'State Godfather';}
elseif($modranks == '16'){ $modrank = 'Don';}
elseif($modranks == '17'){ $modrank = '<b>Respected Don</b>';}
elseif($modranks == '18'){ $modrank = '<b>Stae Don</b>';}
elseif($modranks == '19'){ $modrank = '<b>Gangster</b>';}
elseif($modranks == '20'){ $modrank = '<b>Respected Gangsters</b>';}
elseif($modranks == '21'){ $modrank = '<b>American Gangster</b>';}
elseif($modranks == '22'){ $modrank = '<b>State Gangster</b>';}
elseif($modranks == '25'){ $modrank = '<b>Entertainer Manager</b>';}
elseif($modranks == '50'){ $modrank = '<b>Moderator</b>';}
elseif($modranks == '75'){ $modrank = '<b>HDO Manager</b>';}
elseif($modranks == '100'){ $modrank = '<b>Administrator</b>';}
else{$modrank = '';}
$etests = 0;
echo"<tr><td height=10 width=15% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=khaki size=1 face=verdana>$name</font></a></td><td height=10 width=15% bgcolor=#222222 NOWRAP><font color=khaki size=1 face=verdana>$modrank</font></td><td height=10 width=15% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$killer><font color=khaki size=1 face=verdana>$killer</font></a></td><td height=10 width=55% bgcolor=#222222 NOWRAP><font color=khaki size=1 face=verdana>$reason</font></td></tr>";}?>
</table><br><br>

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