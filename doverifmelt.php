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
<?
$getverif = mysql_query("SELECT ver1,ver2,ver3 FROM users WHERE ID = '$ida'");
$letter = mysql_fetch_array($getverif);
$firstone = $letter['ver1'];
$secondone = $letter['ver2'];
$thirdone = $letter['ver3'];

if($_POST['doverif']){
if(strtolower($_POST['ver1']) != $firstone || strtolower($_POST['ver2']) != $secondone || strtolower($_POST['ver3']) != $thirdone){ $showoutcome++; $outcome="You did not enter the code correctly!"; }
else{
mysql_query("UPDATE users SET ver1 = '0', ver2 = '0', ver3 = '0' WHERE ID = '$ida'");
die(include 'melt.php');
}}
?> 
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
$playerrank = $playerarray['rankid'];
?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Verification</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png" align=center  onLoad="document.myform.ver1.focus()"><br>
<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>
<font color=silver size=2 face=verdana><b>Are you human?</b></font><br><br>

<script type = "text/javascript">
function goNext(qu, nxt) {
nxt = "V" + nxt;
document.getElementById(nxt).focus();
}
</script>

<table align=center class=section><form method=post>
<tr><td colspan=3><div class=tab>Code</td></tr>
<tr><td align=center><div class=button1><img src="verification/<?echo$firstone?>.png"></td><td align=center><div class=button1><img src="verification/<?echo$secondone?>.png"></td><td align=center><div class=button1><img src="verification/<?echo$thirdone?>.png"></td></tr>
<tr><td align=center><div class=button1><input type=text class=textbox size=1 name=ver1 style='text-align:center;' maxlength="1" id="V1" onkeyup="goNext(this,2)"></td><td align=center><div class=button1><input type=text class=textbox size=1 name=ver2 style='text-align:center;' maxlength="1" id="V2" onkeyup="goNext(this,3)"></td><td align=center><div class=button1><input type=text class=textbox size=1 name=ver3 style='text-align:center;' maxlength="1" id="V3" onkeyup="goNext(this,4)"></td></tr>
<tr><td colspan=3 align=center><div class=button1><input type=submit class=textbox name=doverif value=Verify style='width:100%;'></td></tr>
</form></table><br>

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